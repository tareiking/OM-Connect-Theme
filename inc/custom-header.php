<?php
/**
 * Implement Custom Header functionality for Flair
 *
 * @since OM Connect 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @package OM Connect Theme
 *
 * @uses om_connect_header_style()
 * @uses om_connect_admin_header_style()
 * @uses om_connect_admin_header_image()
 */
function om_connect_custom_header_setup() {
	/**
	 * Filter OM Connect custom-header support arguments.
	 *
	 * @since OM Connect 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'om_connect_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 115,
		'height'                 => 21,
		'flex-height'            => true,
		'header-text'            => false,
		'default-image'          => get_template_directory_uri() . '/assets/images/logo.png',
		'wp-head-callback'       => 'om_connect_header_style',
		'admin-head-callback'    => 'om_connect_admin_header_style',
		'admin-preview-callback' => 'om_connect_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'om_connect_custom_header_setup' );

if ( ! function_exists( 'om_connect_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see om_connect_custom_header_setup().
 *
 */
function om_connect_header_style() {
	$text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="om-connect-header-css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // om_connect_header_style


if ( ! function_exists( 'om_connect_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 *
 * @see om_connect_custom_header_setup()
 *
 * @since OM Connect 1.0
 */
function om_connect_admin_header_style() {
?>
	<style type="text/css" id="Flair-admin-header-css">
	.appearance_page_custom-header #headimg {
		background-color: #fff;
		border: none;
		max-width: 1260px;
		min-height: 48px;
	}
	#headimg h1 {
		display: none
	}
	#headimg h1 a {
		display: none;
	}
	#headimg img {
		vertical-align: middle;
	}
	</style>
<?php
}
endif; // om_connect_admin_header_style

if ( ! function_exists( 'om_connect_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see om_connect_custom_header_setup()
 *
 * @since OM Connect 1.0
 */
function om_connect_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo esc_attr( sprintf( ' style="color:#%s;"', get_header_textcolor() ) ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html( bloginfo( 'tagline' ) ); ?></a></h1>
	</div>
<?php
}
endif; // om_connect_admin_header_image
