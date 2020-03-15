<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'selfgraphy_reset_section', array(
	'title'             => esc_html__('Reset all settings','selfgraphy'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'selfgraphy' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'selfgraphy_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'selfgraphy_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'selfgraphy_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'selfgraphy' ),
	'section'           => 'selfgraphy_reset_section',
	'type'              => 'checkbox',
) );
