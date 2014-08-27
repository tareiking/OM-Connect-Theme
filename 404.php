<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package OM Connect Theme
 */

get_header(); ?>


	<div class="row">
	<div class="content-wrap" data-equalizer>

		<!-- Main Blog Content -->
		<div class="medium-8 columns content" role="content">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'om-connect' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'om-connect' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div>
		<!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>