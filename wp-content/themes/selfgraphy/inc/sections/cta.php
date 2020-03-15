<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */
if ( ! function_exists( 'selfgraphy_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Selfgraphy 1.0.0
    */
    function selfgraphy_add_cta_section() {
    	$options = selfgraphy_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'selfgraphy_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'selfgraphy_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        selfgraphy_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'selfgraphy_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Selfgraphy 1.0.0
    * @param array $input cta section details.
    */
    function selfgraphy_get_cta_section_details( $input ) {
        $options = selfgraphy_get_theme_options();

        $content = array();

        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
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
                $page_post['excerpt']   = selfgraphy_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/call-to-action.jpg';

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
// cta section content details.
add_filter( 'selfgraphy_filter_cta_section_details', 'selfgraphy_get_cta_section_details' );


if ( ! function_exists( 'selfgraphy_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Selfgraphy 1.0.0
   *
   */
   function selfgraphy_render_cta_section( $content_details = array() ) {
        $options = selfgraphy_get_theme_options();
        $readmore = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="call-to-action" class="relative">
                <div class="wrapper">
                    <?php $class = ( empty( $content['image'] ) ) ? 'no-post-thumbnail' : 'has-post-thumbnail'; ?>
                    <article class="<?php echo esc_attr( $class ); ?>"><!-- add class 'no-post-thumbnail' when no featured image -->
                        <div class="entry-container">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </header>
                            <?php endif;

                            if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            <?php endif; 
                            if ( ! empty( $readmore ) ) : ?>
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $readmore ); ?></a>
                            <?php endif; ?>

                        </div><!-- .entry-container -->

                        <?php if ( ! empty( $content['image'] ) ) { ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                        <?php } ?>
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->
        <?php endforeach;
    }
endif;