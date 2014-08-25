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

		</style>
	<?php
}
add_action( 'wp_head', 'bambino_enqueue_custom_styles' , 8);