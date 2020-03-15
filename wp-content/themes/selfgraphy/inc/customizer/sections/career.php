<?php
/**
 * Career Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Career section
$wp_customize->add_section( 'selfgraphy_career_section', array(
	'title'             => esc_html__( 'Career','selfgraphy' ),
	'description'       => esc_html__( 'Career Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Career content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[career_section_enable]', array(
	'default'			=> 	$options['career_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[career_section_enable]', array(
	'label'             => esc_html__( 'Career Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_career_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// career title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[career_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['career_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[career_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_career_section',
	'active_callback' 	=> 'selfgraphy_is_career_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[career_title]', array(
		'selector'            => '#education-careers .section-header h2.section-title',
		'settings'            => 'selfgraphy_theme_options[career_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_career_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_theme_options[career_content_category]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_theme_options[career_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy' ),
	'section'           => 'selfgraphy_career_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_is_career_section_enable'
) ) );

// career custom button
$wp_customize->add_setting( 'selfgraphy_theme_options[career_custom_btn]', array(
	'default'          	=> $options['career_custom_btn'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[career_custom_btn]', array(
	'label'             => esc_html__( 'Button text', 'selfgraphy' ),
	'section'           => 'selfgraphy_career_section',
	'active_callback'	=> 'selfgraphy_is_career_section_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[career_custom_btn]', array(
		'selector'            => '#education-careers .view-more a',
		'settings'            => 'selfgraphy_theme_options[career_custom_btn]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_career_btn_partial',
    ) );
}

// career custom button link
$wp_customize->add_setting( 'selfgraphy_theme_options[career_custom_btn_link]', array(
	'default'          	=> $options['career_custom_btn_link'],
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[career_custom_btn_link]', array(
	'label'             => esc_html__( 'Button link', 'selfgraphy' ),
	'section'           => 'selfgraphy_career_section',
	'active_callback'	=> 'selfgraphy_is_career_section_enable',
	'type'				=> 'url'
) );