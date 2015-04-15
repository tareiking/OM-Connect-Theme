<?php

/**
 * Load customiser settings
 */
function om_connect_enqueue_custom_styles()
{
	?>
		<style type="text/css">
			.top-bar .top-bar-section .primary-menu li,
			.top-bar .top-bar-section .primary-menu li a,
			.top-bar .top-bar-section .primary-menu > li.current_page_item a,
			.top-bar .top-bar-section .primary-menu > li.current_page_ancestor a,
			.top-bar .top-bar-section li:not(.has-form) a:not(.button),
			.top-bar .top-bar-section .dropdown li:not(.has-form):not(.active):hover>a:not(.button) {
				 background-color: <?php echo esc_html( get_theme_mod( 'tab_bg_color' ) ); ?>;
			}

			.top-bar .top-bar-section .primary-menu li:hover,
			body .top-bar .top-bar-section .primary-menu li a:hover,
			.top-bar .top-bar-section .primary-menu > li.current_page_item a:hover,
			.top-bar .top-bar-section .primary-menu > li.current_page_ancestor a:hover {
				background-color: <?php echo esc_html( get_theme_mod( 'tab_bg_color' ) ); ?>;
			}

			.top-bar .top-bar-section .primary-menu > li.current_page_item,
			.top-bar .top-bar-section .primary-menu > li.current_page_ancestor,
			.top-bar .top-bar-section li.active:not(.has-form) a:not(.button),
			.top-bar .primary-menu > li.current_page_ancestor > a,
			.comments-area #submit:hover {
				background-color: <?php echo esc_html( get_theme_mod( 'link_color') ); ?> !important;
			}

			.content a,
			.sidebar a,
			.content h2,
			.sidebar .side-nav li a:not(.button),
			.content .entry-title a:hover {
				color: <?php echo esc_html( get_theme_mod( 'link_color') ); ?>;
			}

			.content a:hover,
			.sidebar a:hover,
			.sidebar .side-nav li a:not(.button):hover {
				color: <?php echo esc_html( get_theme_mod( 'link_hover_color' ) ); ?>;
			}

			body .page-header .site-title {
				font-family: <?php echo esc_html( get_theme_mod( 'om_sitelogo_font' ) ); ?>;
				color: <?php echo esc_html( get_theme_mod( 'om_sitelogo_color' ) ); ?>;
				text-shadow:  2px 2px 0px rgba(0, 0, 0, .08);
			}

			footer .footer p,
			footer .footer h1,
			footer .footer h2,
			footer .footer h3,
			footer .footer h3,
			footer .footer h4,
			footer .footer h5,
			footer .footer h6,
			footer .footer a
			{
				color: <?php echo esc_html( get_theme_mod( 'footer_txt_color' ) ); ?> !important;
			}

			footer .footer a:hover {
				color: <?php echo esc_html( get_theme_mod( 'footer_hover_color' ) ); ?> !important;
			}

		</style>
	<?php
}
add_action( 'wp_head', 'om_connect_enqueue_custom_styles' , 8);