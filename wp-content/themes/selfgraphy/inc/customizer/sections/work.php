<?php
/**
 * Work Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Work section
$wp_customize->add_section( 'selfgraphy_work_section', array(
	'title'             => esc_html__( 'Work','selfgraphy' ),
	'description'       => esc_html__( 'Work Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Work content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[work_section_enable]', array(
	'default'			=> 	$options['work_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[work_section_enable]', array(
	'label'             => esc_html__( 'Work Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_work_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// work title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[work_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['work_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[work_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_work_section',
	'active_callback' 	=> 'selfgraphy_is_work_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[work_title]', array(
		'selector'            => '#work-experience .section-header h2.section-title',
		'settings'            => 'selfgraphy_theme_options[work_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_work_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'selfgraphy_theme_options[work_content_category]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Selfgraphy_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_theme_options[work_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'selfgraphy' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'selfgraphy' ),
	'section'           => 'selfgraphy_work_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'selfgraphy_is_work_section_enable'
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// work custom button
	$wp_customize->add_setting( 'selfgraphy_theme_options[work_custom_btn_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_theme_options[work_custom_btn_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Button text %d', 'selfgraphy' ), $i ),
		'section'           => 'selfgraphy_work_section',
		'active_callback'	=> 'selfgraphy_is_work_section_enable',
	) );

endfor;
