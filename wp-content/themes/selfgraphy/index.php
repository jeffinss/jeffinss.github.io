<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

get_header(); 
?>

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php  
			$sticky_posts = get_option( 'sticky_posts' );
			if ( ! empty( $sticky_posts ) ) :
				$sticky_count = 0;
				if ( ! empty($sticky_posts) ) :
					$sticky_count = count( $sticky_posts );
				endif;
				?>
				
				<div class="sticky-post-wrapper posts-wrapper">
					<?php $sticky_args = array(
						'post_type'	=> 'post',
						'post__in'	=> ( array ) $sticky_posts,
						'posts_per_page' => absint( $sticky_count ),
					); 
					$sticky_query = new WP_Query( $sticky_args );
					if ( $sticky_query->have_posts() ) : while ( $sticky_query->have_posts() ) : $sticky_query->the_post();

					?>
					    <article class="sticky <?php echo ( has_post_thumbnail() ) ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>">
					        <div class="featured-image">
					            <?php if ( has_post_thumbnail() ) : ?>
					            	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' , array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>"></a>
					            <?php endif; ?>
					            <div class="entry-meta">
					                <?php selfgraphy_author(); ?>

					                <?php if ( selfgraphy_archive_meta_option( 'hide_date' ) ) : 
						                selfgraphy_posted_on();
						                ?>
						            <?php endif; ?>
					            </div><!-- .entry-meta -->
					        </div><!-- .featured-image -->

					        <div class="entry-container">
					            <div class="entry-meta">
					                <?php selfgraphy_article_footer_meta(); ?>       
					            </div><!-- .entry-meta -->

					            <header class="entry-header">
					                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					            </header>

					            <div class="entry-content">
					                <?php the_excerpt(); 
					                $options = selfgraphy_get_theme_options();
					                $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'selfgraphy' );
					                ?>
	        						<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $readmore ); ?></a>
					            </div><!-- .entry-content -->
					        </div><!-- .entry-container -->
					    </article>
				    <?php endwhile; endif; 
				    wp_reset_postdata(); ?>
				</div><!-- .sticky-post-wrapper -->
			<?php endif; ?>
			<div class="archive-blog-wrapper posts-wrapper clear">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - selfgraphy_action_pagination.
			*
			* @hooked selfgraphy_pagination 
			*/
			do_action( 'selfgraphy_action_pagination' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( selfgraphy_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
