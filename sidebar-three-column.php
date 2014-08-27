<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package OM Connect Theme
 */
?>
<!-- Three Column Sidebar -->

	<aside class="medium-3 columns hide-for-small sidebar sidebar-left" data-equalizer-watch>

<?php if ( ! dynamic_sidebar( 'three-column-widget-area' ) ) : ?>

<?php endif; // end sidebar widget area ?>

	</aside>
