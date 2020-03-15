<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add About section
$wp_customize->add_section( 'selfgraphy_about_section', array(
	'title'             => esc_html__( 'About Us','selfgraphy' ),
	'description'       => esc_html__( 'About Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_about_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[about_content_page]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Dropdown_Chooser( $wp_customize, 'selfgraphy_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy' ),
	'section'           => 'selfgraphy_about_section',
	'choices'			=> selfgraphy_page_choices(),
	'active_callback'	=> 'selfgraphy_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' 			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_about_section',
	'active_callback' 	=> 'selfgraphy_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[about_btn_title]', array(
		'selector'            => '#about-me a.btn',
		'settings'            => 'selfgraphy_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_about_btn_title_partial',
    ) );
}

// about note control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[about_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Selfgraphy_Note_Control( $wp_customize, 'selfgraphy_theme_options[about_heading_label]', array(
	'label'             => esc_html__( 'Skill section', 'selfgraphy' ),
	'section'           => 'selfgraphy_about_section',
	'active_callback'	=> 'selfgraphy_is_about_section_enable',
) ) );

// Skill content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[skill_section_enable]', array(
	'default'			=> 	$options['skill_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[skill_section_enable]', array(
	'label'             => esc_html__( 'Skill Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_about_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :
	// skill name
	$wp_customize->add_setting( 'selfgraphy_theme_options[skill_name_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'selfgraphy_theme_options[skill_name_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Name %d', 'selfgraphy' ), $i ),
		'section'           => 'selfgraphy_about_section',
		'active_callback'	=> 'selfgraphy_is_skill_section_enable',
	) );

	// skill value
	$wp_customize->add_setting( 'selfgraphy_theme_options[skill_value_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_sanitize_number_range',
	) );

	$wp_customize->add_control( 'selfgraphy_theme_options[skill_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d ( in percentage )', 'selfgraphy' ), $i ),
		'section'           => 'selfgraphy_about_section',
		'active_callback'	=> 'selfgraphy_is_skill_section_enable',
		'type'				=> 'number',
		'input_attrs'		=> array(
			'min'	=> 1,
			'max'	=> 100,
			),
	) );

	// Separator setting
	$wp_customize->add_setting( 'selfgraphy_theme_options[skill_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Selfgraphy_Note_Control( $wp_customize, 'selfgraphy_theme_options[skill_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'selfgraphy' ),
		'section'           => 'selfgraphy_about_section',
		'active_callback'	=> 'selfgraphy_is_skill_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;