<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

/**
 * selfgraphy_footer_primary_content hook
 *
 * @hooked selfgraphy_add_contact_section -  10
 *
 */
do_action( 'selfgraphy_footer_primary_content' );

/**
 * selfgraphy_content_end_action hook
 *
 * @hooked selfgraphy_content_end -  10
 *
 */
do_action( 'selfgraphy_content_end_action' );

/**
 * selfgraphy_content_end_action hook
 *
 * @hooked selfgraphy_footer_start -  10
 * @hooked Selfgraphy_Footer_Widgets->add_footer_widgets -  20
 * @hooked selfgraphy_footer_site_info -  40
 * @hooked selfgraphy_footer_end -  100
 *
 */
do_action( 'selfgraphy_footer' );

/**
 * selfgraphy_page_end_action hook
 *
 * @hooked selfgraphy_page_end -  10
 *
 */
do_action( 'selfgraphy_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
