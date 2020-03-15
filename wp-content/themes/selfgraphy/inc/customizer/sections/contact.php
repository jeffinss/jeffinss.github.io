<?php
/**
 * Contact Section options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

// Add Contact section
$wp_customize->add_section( 'selfgraphy_contact_section', array(
	'title'             => esc_html__( 'Contact','selfgraphy' ),
	'description'       => esc_html__( 'Contact Section options.', 'selfgraphy' ),
	'panel'             => 'selfgraphy_front_page_panel',
) );

// Contact content enable control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[contact_section_enable]', array(
	'default'			=> 	$options['contact_section_enable'],
	'sanitize_callback' => 'selfgraphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Selfgraphy_Switch_Control( $wp_customize, 'selfgraphy_theme_options[contact_section_enable]', array(
	'label'             => esc_html__( 'Contact Section Enable', 'selfgraphy' ),
	'section'           => 'selfgraphy_contact_section',
	'on_off_label' 		=> selfgraphy_switch_options(),
) ) );

if ( class_exists( 'WPCF7' ) ) {
	$description = sprintf( __( 'You can manage the Contact Form 7 shortcodes from %1$s here %2$s.', 'selfgraphy' ), '<a href="' .  esc_url( admin_url('admin.php?page=wpcf7' ) ) . '" target="_blank">', '</a>' );
} else {
	$description = sprintf( __( 'We recommend you to install Contact Form 7 plugin from %1$s here %2$s</a> for shortcodes.', 'selfgraphy' ), '<a href="' .  esc_url( admin_url('themes.php?page=tgmpa-install-plugins' ) ) . '" target="_blank">', '</a>' );
}

// contact image setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[contact_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[contact_shortcode]',
		array(
		'label'       		=> esc_html__( 'Contact shortcode', 'selfgraphy' ),
		'description'		=> $description,
		'section'     		=> 'selfgraphy_contact_section',
		'active_callback'	=> 'selfgraphy_is_contact_section_enable',
) );

// contact pages drop down chooser control and setting
$wp_customize->add_setting( 'selfgraphy_theme_options[contact_content_page]', array(
	'sanitize_callback' => 'selfgraphy_sanitize_page',
) );

$wp_customize->add_control( new Selfgraphy_Dropdown_Chooser( $wp_customize, 'selfgraphy_theme_options[contact_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'selfgraphy' ),
	'section'           => 'selfgraphy_contact_section',
	'choices'			=> selfgraphy_page_choices(),
	'active_callback'	=> 'selfgraphy_is_contact_section_enable',
) ) );