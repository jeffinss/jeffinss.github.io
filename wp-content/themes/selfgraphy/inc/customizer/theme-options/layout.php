<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'selfgraphy_layout', array(
	'title'               => esc_html__('Layout','selfgraphy'),
	'description'         => esc_html__( 'Layout section options.', 'selfgraphy' ),
	'panel'               => 'selfgraphy_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[site_layout]', array(
	'sanitize_callback'   => 'selfgraphy_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Selfgraphy_Custom_Radio_Image_Control ( $wp_customize, 'selfgraphy_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'selfgraphy' ),
	'section'             => 'selfgraphy_layout',
	'choices'			  => selfgraphy_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'selfgraphy_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Selfgraphy_Custom_Radio_Image_Control ( $wp_customize, 'selfgraphy_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'selfgraphy' ),
	'section'             => 'selfgraphy_layout',
	'choices'			  => selfgraphy_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'selfgraphy_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Selfgraphy_Custom_Radio_Image_Control ( $wp_customize, 'selfgraphy_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'selfgraphy' ),
	'section'             => 'selfgraphy_layout',
	'choices'			  => selfgraphy_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'selfgraphy_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Selfgraphy_Custom_Radio_Image_Control( $wp_customize, 'selfgraphy_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'selfgraphy' ),
	'section'             => 'selfgraphy_layout',
	'choices'			  => selfgraphy_sidebar_position(),
) ) );