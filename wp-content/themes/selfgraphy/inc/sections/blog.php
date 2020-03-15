<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */
if ( ! function_exists( 'selfgraphy_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Selfgraphy 1.0.0
    */
    function selfgraphy_add_blog_section() {
    	$options = selfgraphy_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'selfgraphy_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        selfgraphy_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Selfgraphy 1.0.0
    * @param array $input blog section details.
    */
    function selfgraphy_get_blog_section_details( $input ) {
        $options = selfgraphy_get_theme_options();

        $content = array();
        	
        $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'category__not_in'  => ( array ) $cat_ids,
            'ignore_sticky_posts'   => true,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['author_id'] = get_the_author_meta( 'ID' );
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = selfgraphy_trim_content( 15 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'selfgraphy_filter_blog_section_details', 'selfgraphy_get_blog_section_details' );


if ( ! function_exists( 'selfgraphy_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Selfgraphy 1.0.0
   *
   */
   function selfgraphy_render_blog_section( $content_details = array() ) {
        $options = selfgraphy_get_theme_options();
        $btn_label = ! empty( $options['blog_btn_title'] ) ? $options['blog_btn_title'] : '';
        $btn_url = ! empty( $options['blog_btn_url'] ) ? $options['blog_btn_url'] : '#';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blog" class="relative page-section">
                <div class="wrapper">
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>
                    <!-- supports col-1, col-2 and col-3 -->
                    <div class="section-content posts-wrapper col-3">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>
                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <?php selfgraphy_article_footer_meta( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-meta">
                                        <?php selfgraphy_author( $content['author_id'] ); ?>
                                        <?php selfgraphy_posted_on( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->

                    <?php if ( ! empty( $btn_label ) ) : ?>
                        <div class="view-more">
                            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn"><?php echo esc_html( $btn_label ); ?></a>
                        </div><!-- .more-link -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #latest-posts -->

    <?php }
endif;