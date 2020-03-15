<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

$wp_customize->add_section( 'selfgraphy_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','selfgraphy' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'selfgraphy' ),
	'section'          	=> 'selfgraphy_breadcrumb',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'selfgraphy_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'selfgraphy' ),
	'active_callback' 	=> 'selfgraphy_is_breadcrumb_enable',
	'section'          	=> 'selfgraphy_breadcrumb',
) );
