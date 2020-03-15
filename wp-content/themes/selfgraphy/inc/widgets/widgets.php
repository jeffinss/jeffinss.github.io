<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Selfgraphy
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';


/**
 * Register widgets
 */
function selfgraphy_register_widgets() {

	register_widget( 'Selfgraphy_Latest_Post' );

	register_widget( 'Selfgraphy_Social_Link' );

}
add_action( 'widgets_init', 'selfgraphy_register_widgets' );