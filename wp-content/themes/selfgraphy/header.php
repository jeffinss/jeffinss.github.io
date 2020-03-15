<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Selfgraphy
	 * @since Selfgraphy 1.0.0
	 */

	/**
	 * selfgraphy_doctype hook
	 *
	 * @hooked selfgraphy_doctype -  10
	 *
	 */
	do_action( 'selfgraphy_doctype' );

?>
<head>
<?php
	/**
	 * selfgraphy_before_wp_head hook
	 *
	 * @hooked selfgraphy_head -  10
	 *
	 */
	do_action( 'selfgraphy_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * selfgraphy_page_start_action hook
	 *
	 * @hooked selfgraphy_page_start -  10
	 *
	 */
	do_action( 'selfgraphy_page_start_action' ); 

	/**
	 * selfgraphy_loader_action hook
	 *
	 * @hooked selfgraphy_loader -  10
	 *
	 */
	do_action( 'selfgraphy_before_header' );

	/**
	 * selfgraphy_header_action hook
	 *
	 * @hooked selfgraphy_header_start -  10
	 * @hooked selfgraphy_sidr_menu -  15
	 * @hooked selfgraphy_site_branding -  20
	 * @hooked selfgraphy_site_navigation -  30
	 * @hooked selfgraphy_header_end -  50
	 *
	 */
	do_action( 'selfgraphy_header_action' );

	/**
	 * selfgraphy_mobile_menu hook
	 *
	 * @hooked selfgraphy_mobile_menu -  10
	 *
	 */
	do_action( 'selfgraphy_mobile_menu' );

	/**
	 * selfgraphy_content_start_action hook
	 *
	 * @hooked selfgraphy_content_start -  10
	 *
	 */
	do_action( 'selfgraphy_content_start_action' );

	/**
	 * selfgraphy_header_image_action hook
	 *
	 * @hooked selfgraphy_header_image -  10
	 *
	 */
	do_action( 'selfgraphy_header_image_action' );

    if ( selfgraphy_is_frontpage() ) {

    	$sections = selfgraphy_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'selfgraphy_primary_content', 'selfgraphy_add_'. $section .'_section', selfgraphy_sort( $section ) );
		}
		do_action( 'selfgraphy_primary_content' );
	}