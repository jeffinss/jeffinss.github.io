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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
    <div class="entry-meta">
        <?php 
        selfgraphy_author();

        if ( ! $options['single_post_hide_date'] ) :
        	selfgraphy_posted_on();
    	endif;
        ?>
    </div><!-- .entry-meta -->
    <?php if ( has_post_thumbnail() ) : ?> 
	    <div class="featured-image">
	    	<?php the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	    </div><!-- .featured-image -->
    <?php endif; ?>

	<div class="entry-container">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'selfgraphy' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'selfgraphy' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->
	<div class="entry-meta">
	    <?php if ( ! $options['single_post_hide_category'] ) :
       		selfgraphy_single_categories();
    	endif; ?>      
		<?php selfgraphy_entry_footer(); ?>
	</div><!-- .entry-meta -->
</article><!-- #post-## -->
