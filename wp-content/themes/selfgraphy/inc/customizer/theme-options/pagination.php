<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'selfgraphy_pagination', array(
	'title'               => esc_html__('Pagination','selfgraphy'),
	'description'         => esc_html__( 'Pagination section options.', 'selfgraphy' ),
	'panel'               => 'selfgraphy_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'selfgraphy' ),
	'section'             => 'selfgraphy_pagination',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'selfgraphy_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'selfgraphy_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'selfgraphy' ),
	'section'             => 'selfgraphy_pagination',
	'type'                => 'select',
	'choices'			  => selfgraphy_pagination_options(),
	'active_callback'	  => 'selfgraphy_is_pagination_enable',
) );
