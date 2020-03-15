<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */
if ( ! function_exists( 'selfgraphy_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Selfgraphy 1.0.0
    */
    function selfgraphy_add_about_section() {
    	$options = selfgraphy_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'selfgraphy_section_status', true, 'about_section_enable' );
        $skill_enable = apply_filters( 'selfgraphy_section_status', true, 'skill_section_enable' );

        if ( ! $about_enable && ! $skill_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        selfgraphy_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Selfgraphy 1.0.0
    * @param array $input about section details.
    */
    function selfgraphy_get_about_section_details( $input ) {
        $options = selfgraphy_get_theme_options();

        $content = array();
        	
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = selfgraphy_trim_content( 50 );

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
// about section content details.
add_filter( 'selfgraphy_filter_about_section_details', 'selfgraphy_get_about_section_details' );


if ( ! function_exists( 'selfgraphy_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Selfgraphy 1.0.0
   *
   */
   function selfgraphy_render_about_section( $content_details = array() ) {
        $options = selfgraphy_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : 
            if ( $options['about_section_enable'] && $options['skill_section_enable'] ) {
                $col = 'col-2';
            } else {
                $col = 'col-1';
            }

            ?>
            <div id="about-me" class="relative page-section <?php echo esc_attr( $col ); ?>"><!-- supports 'col-1' also -->
                <div class="wrapper">
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content">
                        <?php if ( $options['about_section_enable'] ) : ?>
                            <div class="hentry">
                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                                <?php if ( ! empty( $options['about_btn_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['about_btn_title'] ); ?></a>
                                <?php endif; ?>
                            </div><!-- .hentry -->
                        <?php endif; ?>

                        <?php if ( $options['skill_section_enable'] ) : ?>
                            <div class="hentry">
                                <div class="skills-wrapper">
                                    <div class="skill-item">
                                        <?php for ( $i=1; $i <= 3; $i++ ): 
                                            if ( ! empty( $options['skill_value_' . $i ] ) ) : ?>
                                                <div class="skill-outerbox">
                                                    <div class="skill-innerbox" skill-value="<?php echo absint( $options['skill_value_' . $i ] ); ?>%">
                                                        <span class="skill-title"><?php echo esc_html( $options['skill_name_' . $i ] ); ?></span>
                                                        <span class="skill-value"><?php echo absint( $options['skill_value_' . $i ] ); ?><?php esc_html_e( '%', 'selfgraphy' ); ?></span>
                                                    </div>
                                                </div><!-- .skill-outerbox -->
                                            <?php endif; ?>                         
                                        <?php endfor; ?>
                                    </div><!-- .skill-item -->
                                </div>
                            </div><!-- .hentry -->
                        <?php endif; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #about-me -->
        <?php endforeach;
    }
endif;