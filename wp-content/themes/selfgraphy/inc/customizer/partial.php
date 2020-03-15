<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Selfgraphy
* @since Selfgraphy 1.0.0
*/

if ( ! function_exists( 'selfgraphy_details_position_partial' ) ) :
    // details position
    function selfgraphy_details_position_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['details_position'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_service_title_partial' ) ) :
    // service title
    function selfgraphy_service_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_service_description_partial' ) ) :
    // service description
    function selfgraphy_service_description_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['service_description'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_about_btn_title_partial' ) ) :
    // about btn title
    function selfgraphy_about_btn_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_work_title_partial' ) ) :
    // work title
    function selfgraphy_work_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['work_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_career_title_partial' ) ) :
    // career title
    function selfgraphy_career_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['career_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_career_btn_partial' ) ) :
    // career btn
    function selfgraphy_career_btn_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['career_custom_btn'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_count_down_title_partial' ) ) :
    // count_down title
    function selfgraphy_count_down_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['count_down_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_count_down_sub_title_partial' ) ) :
    // count down sub title
    function selfgraphy_count_down_sub_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['count_down_sub_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_portfolio_title_partial' ) ) :
    // portfolio title
    function selfgraphy_portfolio_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['portfolio_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_portfolio_btn_label_partial' ) ) :
    // portfolio btn label
    function selfgraphy_portfolio_btn_label_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['portfolio_btn_label'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_cta_btn_title_partial' ) ) :
    // cta btn title
    function selfgraphy_cta_btn_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_blog_title_partial' ) ) :
    // blog title
    function selfgraphy_blog_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_blog_btn_title_partial' ) ) :
    // blog btn title
    function selfgraphy_blog_btn_title_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;

if ( ! function_exists( 'selfgraphy_copyright_text_partial' ) ) :
    // blog btn title
    function selfgraphy_copyright_text_partial() {
        $options = selfgraphy_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;