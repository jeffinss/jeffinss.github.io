<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'selfgraphy_blog_section', array(
	'title'             => esc_html__( 'Blog','selfgraphy' ),
	'description'       => esc_html__( 'Blog Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_blog_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// blog note control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Note_Control( $wp_customize, 'selfgraphy_theme_options[blog_heading_label]', array(
	'label'             => esc_html__( 'Heading Section', 'selfgraphy' ),
	'section'           => 'selfgraphy_blog_section',
	'active_callback'	=> 'selfgraphy_is_blog_section_enable',
) ) );


// 

// blog title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_blog_section',
	'active_callback' 	=> 'selfgraphy_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[blog_title]', array(
		'selector'            => '#blog .section-header h2.section-title',
		'settings'            => 'selfgraphy_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_blog_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[blog_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_blog_section',
	'active_callback' 	=> 'selfgraphy_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[blog_btn_title]', array(
		'selector'            => '#blog .view-more a.btn',
		'settings'            => 'selfgraphy_theme_options[blog_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_blog_btn_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['blog_btn_url'],
) );

$wp_customize->add_control( 'selfgraphy_theme_options[blog_btn_url]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_blog_section',
	'active_callback' 	=> 'selfgraphy_is_blog_section_enable',
	'type'				=> 'url',
) );

// blog note control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_content_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Note_Control( $wp_customize, 'selfgraphy_theme_options[blog_content_label]', array(
	'label'             => esc_html__( 'Content Section', 'selfgraphy' ),
	'section'           => 'selfgraphy_blog_section',
	'active_callback'	=> 'selfgraphy_is_blog_section_enable',
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Selfgraphy_Dropdown_Category_Control( $wp_customize,'selfgraphy_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'selfgraphy' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Ctrl key select multilple categories.', 'selfgraphy' ),
	'section'           => 'selfgraphy_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'selfgraphy_is_blog_section_enable'
) ) );
