<?php

/**
 * Load customiser settings
 */
function bambino_enqueue_custom_styles()
{
	?>
		<style type="text/css">
			.top-bar .top-bar-section .primary-menu li,
			.top-bar .top-bar-section .primary-menu li a {
				 /*background-color: <?php echo get_theme_mod( 'secondary_color' ); ?>;*/
			}

			.top-bar .top-bar-section .primary-menu > li.current_page_item a,
			.top-bar .top-bar-section .primary-menu > li.current_page_ancestor a{
				/*background-color: <?php echo get_theme_mod( 'primary_color' ); ?>;*/
			}

			body .page-header .site-title {
				font-family: <?php echo get_theme_mod( 'om_sitelogo_font' ); ?>;
				color: <?php echo get_theme_mod( 'om_sitelogo_color' ); ?>;
				text-shadow:  2px 2px 0px rgba(0, 0, 0, .08);
			}

		</style>
	<?php
}
add_action( 'wp_head', 'bambino_enqueue_custom_styles' , 8);