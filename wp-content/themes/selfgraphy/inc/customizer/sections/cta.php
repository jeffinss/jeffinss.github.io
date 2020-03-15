<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'selfgraphy_cta_section', array(
	'title'             => esc_html__( 'Call to Action','selfgraphy' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_cta_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Dropdown_Chooser( $wp_customize, 'selfgraphy_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy' ),
	'section'           => 'selfgraphy_cta_section',
	'choices'			=> selfgraphy_page_choices(),
	'active_callback'	=> 'selfgraphy_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_cta_section',
	'active_callback' 	=> 'selfgraphy_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action a.btn',
		'settings'            => 'selfgraphy_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_cta_btn_title_partial',
    ) );
}