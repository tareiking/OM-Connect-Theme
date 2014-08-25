<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package OM Connect Theme
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function om_connect_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'om_connect_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function om_connect_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'om_connect_body_classes' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function om_connect_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'om-connect' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'om_connect_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function om_connect_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'om_connect_setup_author' );

/**
 * Featured image, lets tell people what works good
 */
add_filter( 'admin_post_thumbnail_html', 'connect_change_featuredimage_content' );

function connect_change_featuredimage_content( $content ) {

	$instruction_content = 'Recommended size: <strong>960 x 460</strong>px.';
	$instruction = '<p class="connect-featuredimage-instruction">' . $instruction_content . '</p>';
	$content = $instruction . $content;

	return $content;

} // end connect_change_featuredimage_content

function om_connect_backstretch(){
	if ( get_background_image() != '' ){
		wp_enqueue_script( 'backstretch',  get_template_directory_uri() . '/assets/js/backstretch.min.js', array( 'jquery' ), '2.0.4', true );

		add_ation( 'wp_head', 'om_connect_localize_backstretch' );
	}
}

/**
 * Uses the sites custom background and makes it full-width and stretchy
 */
function om_connect_customise_background(){

	if ( get_background_image() != '' ){

		$img_src = get_background_image();

		wp_enqueue_script( 'backstretch',  get_template_directory_uri() . '/assets/js/backstretch.min.js', array( 'jquery' ), '2.0.4', true );
		wp_enqueue_script( 'backstretch-custom',  get_template_directory_uri() . '/assets/js/backstretch.js', array( 'backstretch' ), '2.0.4', true );

		wp_localize_script( 'backstretch', 'om_connect_custom_vars',
			array(
				'background' => $img_src
			)
		);

	}
}
// add_action( 'wp_enqueue_scripts', 'om_connect_customise_background' );