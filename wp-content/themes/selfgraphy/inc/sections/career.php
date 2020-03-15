<?php
/**
 * Career section
 *
 * This is the template for the content of career section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */
if ( ! function_exists( 'selfgraphy_add_career_section' ) ) :
    /**
    * Add career section
    *
    *@since Selfgraphy 1.0.0
    */
    function selfgraphy_add_career_section() {
        $options = selfgraphy_get_theme_options();
        // Check if career is enabled on frontpage
        $career_enable = apply_filters( 'selfgraphy_section_status', true, 'career_section_enable' );

        if ( true !== $career_enable ) {
            return false;
        }
        // Get career section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_filter_career_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render career section now.
        selfgraphy_render_career_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_get_career_section_details' ) ) :
    /**
    * career section details.
    *
    * @since Selfgraphy 1.0.0
    * @param array $input career section details.
    */
    function selfgraphy_get_career_section_details( $input ) {
        $options = selfgraphy_get_theme_options();

        $content = array();
            
        $cat_id = ! empty( $options['career_content_category'] ) ? $options['career_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['content']     = selfgraphy_trim_content( 15 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
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
// career section content details.
add_filter( 'selfgraphy_filter_career_section_details', 'selfgraphy_get_career_section_details' );


if ( ! function_exists( 'selfgraphy_render_career_section' ) ) :
  /**
   * Start career section
   *
   * @return string career content
   * @since Selfgraphy 1.0.0
   *
   */
   function selfgraphy_render_career_section( $content_details = array() ) {
        $options = selfgraphy_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="education-careers" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['career_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['career_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content posts-wrapper col-3">
                    <?php 
                    $i = 1;
                    foreach ( $content_details as $content ) : 
                        $class = ( empty( $content['image'] ) ) ? 'no-post-thumbnail' : 'has-post-thumbnail';
                        ?>
                        <article class="<?php echo esc_attr( $class ); ?>"><!-- add class 'no-post-thumbnail' when no featured image -->
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                <?php endif; ?>

                                <?php if ( ! empty( $content['content'] ) ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['content'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </article>
                    <?php 
                    $i++;
                    endforeach; ?>
                    </div><!-- .section-content -->
                    <?php if ( ! empty( $options['career_custom_btn' ] ) ) : ?>
                        <div class="view-more">
                            <a href="<?php echo esc_url( $options['career_custom_btn_link'] ); ?>" class="btn"><?php echo esc_html( $options['career_custom_btn'] ); ?></a>
                        </div><!-- .view-more -->
                    <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #career-experience -->

    <?php }
endif;