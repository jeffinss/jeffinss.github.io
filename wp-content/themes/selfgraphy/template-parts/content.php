<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

$options = selfgraphy_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'selfgraphy' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
    
    <div class="featured-image" 
        <?php if ( has_post_thumbnail() ) : ?> 
            style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');" 
        <?php endif; ?>>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
    </div>
    
    <div class="entry-container">
        <div class="entry-meta">
            <?php selfgraphy_article_footer_meta(); ?> 
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <div class="entry-meta">

            <?php selfgraphy_author(); ?>

            <?php 
            if ( selfgraphy_archive_meta_option( 'hide_date' ) ) : 
                selfgraphy_posted_on();
                ?>
            <?php endif; ?>
        </div><!-- .entry-meta -->

    </div><!-- .entry-container -->

</article><!-- #post-## -->
