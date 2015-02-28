<?php
/**
 * OM Connect functions and definitions
 *
 * @package OM Connect Theme
 */

define( 'FOUNDATION_VERSION', '5.3.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'om_connect_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function om_connect_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'om-connect' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'om-connect', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'om-connect' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	# add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Add our TinyMCE Editor Styles
	 */
	add_editor_style( 'assets/css/editor-style.css' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	/**
	 * Add Title Tag support
	 * @since 4.1
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Optionally add Foundation utilities
	 */
	# add_theme_support( 'foundation-interchange' );
	# add_theme_support( 'foundation-top-bar' );
	# add_theme_support( 'foundation-sticky-top-bar' );
	# add_theme_support( 'foundation-magellan' );
	# add_theme_support( 'foundation-orbit' );
	# add_theme_support( 'foundation-clearing' );
	# add_theme_support( 'foundation-abide' );
	# add_theme_support( 'foundation-reveal' );
	# add_theme_support( 'foundation-alert' );
	# add_theme_support( 'foundation-tooltip' );
	# add_theme_support( 'foundation-joyride' );
	add_theme_support( 'foundation-equalizer' );
	# add_theme_support( 'foundation-accordion' );
	# add_theme_support( 'foundation-tabs' );
	# add_theme_support( 'remove-comments' );

	/**
	 * Theme specific image sizes
	 */
	add_image_size( 'featured-image', 960, 460, true );
}
endif; // om_connect_setup
add_action( 'after_setup_theme', 'om_connect_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function om_connect_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'om-connect' ),
		'id'            => 'blog-widget-area',
		'description'   => __( 'The blog widget area which is located on the left or right hand side of the blog posts and archives', 'om-connect' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s side-nav">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'om-connect' ),
		'id'            => 'page-widget-area',
		'description'   => __( 'The page widget area which is located on the left or right hand side of the pages', 'om-connect' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s side-nav">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Three Column Sidebar', 'om-connect' ),
		'id'            => 'three-column-widget-area',
		'description'   => __( 'The three column sidebar is displayed on the left of any pages which use the "Three Column Template".', 'om-connect' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s side-nav">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area', 'om-connect' ),
		'id'            => 'footer-widget-area',
		'description'   => __( 'The footer widget area which is located at the bottom of the site', 'om-connect' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s side-nav">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'om_connect_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function om_connect_scripts() {
	wp_enqueue_style( 'om-connect-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', connect_google_url(), array(), null );
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.2.0', null );

	wp_enqueue_style( 'foundation-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '1.0' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '2.7.1' );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), FOUNDATION_VERSION, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array( 'foundation' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'om_connect_scripts' );

/* Let's add the includes. Unused includes will be deleted during setup  */
foreach ( glob( get_template_directory() . '/inc/*.php' ) as $filename ) {
	require_once $filename;
}

/**
 * Google, Google, Google fonty!
 */
function connect_google_url(){
	$base_fonts = 'Montserrat:400|Open+Sans:400|Merriweather:300';

	if ( get_theme_mod( 'om_sitelogo_font' ) != '' ) {
		$base_fonts .= '|' . get_theme_mod( 'om_sitelogo_font' ) . ':400|';
	}

	$font_url = add_query_arg( 'family', urlencode( $base_fonts ), "//fonts.googleapis.com/css" );

	return $font_url;
}

/**
 * Add fonts to admin
 */
function connect_admin_scripts(){
	wp_enqueue_style( 'google-fonts', connect_google_url(), array(), null );
}

add_action( 'admin_enqueue_scripts', 'connect_admin_scripts' );

// title tag implementation with backward compatibility
if ( ! function_exists( '_wp_render_title_tag' ) ) :

	function theme_slug_render_title() { ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php }

	add_action( 'wp_head', 'theme_slug_render_title' );
endif;