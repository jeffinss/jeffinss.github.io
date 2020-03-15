<?php
/**
 * Portfolio Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Portfolio section
$wp_customize->add_section( 'selfgraphy_portfolio_section', array(
	'title'             => esc_html__( 'Portfolios','selfgraphy' ),
	'description'       => esc_html__( 'Portfolios Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Portfolio content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[portfolio_section_enable]', array(
	'default'			=> 	$options['portfolio_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[portfolio_section_enable]', array(
	'label'             => esc_html__( 'Portfolio Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_portfolio_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

// portfolio title setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[portfolio_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[portfolio_title]', array(
	'label'           	=> esc_html__( 'Title', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_portfolio_section',
	'active_callback' 	=> 'selfgraphy_is_portfolio_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[portfolio_title]', array(
		'selector'            => '#portfolio .section-header h2.section-title',
		'settings'            => 'selfgraphy_theme_options[portfolio_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_portfolio_title_partial',
    ) );
}

// portfolio btn label setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[portfolio_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[portfolio_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_portfolio_section',
	'active_callback' 	=> 'selfgraphy_is_portfolio_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'selfgraphy_theme_options[portfolio_btn_label]', array(
		'selector'            => '#portfolio .view-more a',
		'settings'            => 'selfgraphy_theme_options[portfolio_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'selfgraphy_portfolio_btn_label_partial',
    ) );
}

// portfolio btn url setting and control
$wp_customize->add_setting( 'selfgraphy_theme_options[portfolio_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> '#',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[portfolio_btn_link]', array(
	'label'           	=> esc_html__( 'Button Link', 'selfgraphy' ),
	'section'        	=> 'selfgraphy_portfolio_section',
	'active_callback' 	=> 'selfgraphy_is_portfolio_section_enable',
	'type'				=> 'url',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'selfgraphy_theme_options[portfolio_content_category_' . $i . ']', array(
		'sanitize_callback' => 'selfgraphy_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Selfgraphy_Dropdown_Taxonomies_Control( $wp_customize,'selfgraphy_theme_options[portfolio_content_category_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select category %d', 'selfgraphy' ), $i ),
		'section'           => 'selfgraphy_portfolio_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'selfgraphy_is_portfolio_section_enable'
	) ) );
endfor;

