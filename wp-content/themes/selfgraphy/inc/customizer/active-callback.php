<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

if ( ! function_exists( 'selfgraphy_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Selfgraphy 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function selfgraphy_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'selfgraphy_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'selfgraphy_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Selfgraphy 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function selfgraphy_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'selfgraphy_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if details section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_details_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[details_section_enable]' )->value() );
}

/**
 * Check if details social is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_details_section_social_is_enabled( $control ) {
	$social_enable = $control->manager->get_setting( 'selfgraphy_theme_options[details_social_enable]' )->value();
	return selfgraphy_is_details_section_enable( $control ) && $social_enable;
}

/**
 * Check if service section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if skill section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_skill_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[skill_section_enable]' )->value() );
}

/**
 * Check if work section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_work_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[work_section_enable]' )->value() );
}

/**
 * Check if career section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_career_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[career_section_enable]' )->value() );
}

/**
 * Check if portfolio section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_portfolio_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[portfolio_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if contact section is enabled.
 *
 * @since Selfgraphy 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function selfgraphy_is_contact_section_enable( $control ) {
	return ( $control->manager->get_setting( 'selfgraphy_theme_options[contact_section_enable]' )->value() );
}