<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'selfgraphy_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','selfgraphy' ),
	'description'       => esc_html__( 'Archive section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'selfgraphy' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'selfgraphy' ),
	'section'           => 'selfgraphy_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'selfgraphy_is_latest_posts'
) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'selfgraphy' ),
	'section'           => 'selfgraphy_archive_section',
	'on_off_label' 		=> selfgraphy_hide_options(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'selfgraphy' ),
	'section'           => 'selfgraphy_archive_section',
	'on_off_label' 		=> selfgraphy_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'selfgraphy' ),
	'section'           => 'selfgraphy_archive_section',
	'on_off_label' 		=> selfgraphy_hide_options(),
) ) );
