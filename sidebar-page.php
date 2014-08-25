<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package OM Connect Theme
 */
?>
<!-- Sidebar -->
<?php if ( is_page_template('templates/three-column.php' ) ): ?>
	<aside class="medium-3 columns sidebar">
<?php elseif ( ! is_page_template( 'templates/sidebar-left.php' ) ): ?>
	<aside class="medium-4 columns sidebar">
<?php else: ?>
	<aside class="medium-4 pull-9 columns sidebar">
<?php endif; ?>

<?php if ( ! dynamic_sidebar( 'page-widget-area' ) ) : ?>

<?php endif; // end sidebar widget area ?>

	</aside>

<!-- End Sidebar -->

	</div>
</div>
 <!-- End Main Content and Sidebar -->