<?php
/**
 * Theme Palace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 * @subpackage Selfgraphy
 * @since Selfgraphy 1.0.0
 */

if ( ! function_exists( 'selfgraphy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function selfgraphy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Palace, use a find and replace
		 * to change 'selfgraphy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'selfgraphy' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widgets.php' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 490, 375, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'selfgraphy' ),
			'social' 	=> esc_html__( 'Social', 'selfgraphy' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'selfgraphy_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style' . selfgraphy_min() . '.css', selfgraphy_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'selfgraphy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function selfgraphy_content_width() {

	$content_width = $GLOBALS['content_width'];


	$sidebar_position = selfgraphy_layout();
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'right-sidebar':
	    $content_width = 819;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter Selfgraphy content width of the theme.
	 *
	 * @since Selfgraphy 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'selfgraphy_content_width', $content_width );
}
add_action( 'template_redirect', 'selfgraphy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function selfgraphy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'selfgraphy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'selfgraphy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 1, array(
		'name'          => esc_html__( 'Optional Sidebar %d', 'selfgraphy' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'selfgraphy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'selfgraphy_widgets_init' );


if ( ! function_exists( 'selfgraphy_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function selfgraphy_fonts_url() {
	$options = selfgraphy_get_theme_options();

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'selfgraphy' ) ) {
		$fonts[] = 'Lato|Muli:200,300,400,600,700,800,900';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'selfgraphy' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Selfgraphy 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function selfgraphy_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'selfgraphy-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'selfgraphy_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function selfgraphy_scripts() {
	$options = selfgraphy_get_theme_options();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'selfgraphy-fonts', selfgraphy_fonts_url(), array(), null );

	// FontAwesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome' . selfgraphy_min() . '.css' );

	// slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick' . selfgraphy_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . selfgraphy_min() . '.css' );

	wp_enqueue_style( 'sidr-dark', get_template_directory_uri() . '/assets/css/sidr.dark' . selfgraphy_min() . '.css' );

	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup' . selfgraphy_min() . '.css' );

	wp_enqueue_style( 'selfgraphy-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'selfgraphy-html5', get_template_directory_uri() . '/assets/js/html5' . selfgraphy_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'selfgraphy-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'selfgraphy-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . selfgraphy_min() . '.js', array(), '20160412', true );

	wp_enqueue_script( 'selfgraphy-navigation', get_template_directory_uri() . '/assets/js/navigation' . selfgraphy_min() . '.js', array(), '20151215', true );
	
	$selfgraphy_l10n = array(
		'quote'          => selfgraphy_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'selfgraphy' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'selfgraphy' ),
		'icon'           => selfgraphy_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'selfgraphy-navigation', 'selfgraphy_l10n', $selfgraphy_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery-matchHeight' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/assets/js/jquery.sidr' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	// custom script
	wp_register_script( 'selfgraphy-custom', get_template_directory_uri() . '/assets/js/custom' . selfgraphy_min() . '.js', array( 'jquery' ), '', true );

	$current_site = site_url();
	$data = array( 'current_site' => $current_site );

	wp_localize_script( 'selfgraphy-custom', 'data', $data );

	wp_enqueue_script( 'selfgraphy-custom' );

}
add_action( 'wp_enqueue_scripts', 'selfgraphy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';

