<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function selfgraphy_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'selfgraphy' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function selfgraphy_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'selfgraphy' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'selfgraphy_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function selfgraphy_site_layout() {
        $selfgraphy_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/frame.png',
        );

        $output = apply_filters( 'selfgraphy_site_layout', $selfgraphy_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function selfgraphy_selected_sidebar() {
        $selfgraphy_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'selfgraphy' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'selfgraphy' ),
        );

        $output = apply_filters( 'selfgraphy_selected_sidebar', $selfgraphy_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'selfgraphy_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function selfgraphy_sidebar_position() {
        $selfgraphy_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'selfgraphy_sidebar_position', $selfgraphy_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function selfgraphy_pagination_options() {
        $selfgraphy_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'selfgraphy' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'selfgraphy' ),
        );

        $output = apply_filters( 'selfgraphy_pagination_options', $selfgraphy_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'selfgraphy_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function selfgraphy_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'selfgraphy' ),
            'off'       => esc_html__( 'Disable', 'selfgraphy' )
        );
        return apply_filters( 'selfgraphy_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'selfgraphy_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function selfgraphy_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'selfgraphy' ),
            'off'       => esc_html__( 'No', 'selfgraphy' )
        );
        return apply_filters( 'selfgraphy_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'selfgraphy_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function selfgraphy_sortable_sections() {
        $sections = array(
            'details'    => esc_html__( 'Details', 'selfgraphy' ),
            'about'     => esc_html__( 'About Us', 'selfgraphy' ),
            'service'   => esc_html__( 'Services', 'selfgraphy' ),
            'cta'       => esc_html__( 'Call to Action', 'selfgraphy' ),
            'work'    => esc_html__( 'Work', 'selfgraphy' ),
            'career' => esc_html__( 'Career', 'selfgraphy' ),
            'portfolio'     => esc_html__( 'Portfolio', 'selfgraphy' ),
            'blog'      => esc_html__( 'Blog', 'selfgraphy' ),
            'contact'      => esc_html__( 'Contact', 'selfgraphy' ),
        );
        return apply_filters( 'selfgraphy_sortable_sections', $sections );
    }
endif;