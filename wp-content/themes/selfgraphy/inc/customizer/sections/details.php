<?php
/**
 * Details Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Details section
$wp_customize->add_section( 'selfgraphy_details_section', array(
	'title'             => esc_html__( 'Details','selfgraphy' ),
	'description'       => esc_html__( 'Details Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Details content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[details_section_enable]', array(
	'default'			=> 	$options['details_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[details_section_enable]', array(
	'label'             => esc_html__( 'Details Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_details_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// details pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[details_content_page]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Dropdown_Chooser( $wp_customize, 'selfgraphy_theme_options[details_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy' ),
	'section'           => 'selfgraphy_details_section',
	'choices'			=> selfgraphy_page_choices(),
	'active_callback'	=> 'selfgraphy_is_details_section_enable',
) ) );

// details description setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[details_position]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['details_position'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[details_position]', array(
	'label'           	=> esc_html__( 'Position', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_details_section',
	'active_callback' 	=> 'selfgraphy_is_details_section_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[details_position]', array(
		'selector'            => '#personal-details .designation',
		'settings'            => 'selfgraphy_theme_options[details_position]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_details_position_partial',
    ) );
}

// Details content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[details_social_enable]', array(
	'default'			=> 	$options['details_social_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[details_social_enable]', array(
	'label'             => esc_html__( 'Enable social menu', 'selfgraphy' ),
	'section'           => 'selfgraphy_details_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
	'active_callback'	=> 'selfgraphy_is_details_section_enable',
) ) );

// Details social note setting
$wp_customize->add_setting( 'selfgraphy_theme_options[details_social_context]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new Selfgraphy_Note_Control( $wp_customize, 'selfgraphy_theme_options[details_social_context]', array(
	'label'             => __( '<h3><a class="details-social-deeplink" href="">Manage social menu from here</a></h3>', 'selfgraphy' ),
	'section'           => 'selfgraphy_details_section',
	'active_callback'	=> 'selfgraphy_is_details_section_social_is_enabled',
	'type'				=> 'custom-html',
) ) );