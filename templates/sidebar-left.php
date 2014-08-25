<?php
/**
 * Template Name: Sidebar Left Template
 *
 * The template for displaying the Sidebar on the left hand side of the page
 *
 * @package OM Connect Theme
 */

get_header(); ?>

	<div class="row">
	<div class="content-wrap">

		<!-- Main Blog Content -->
		<div class="medium-8 push-4 columns content" role="content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					}
				?>

			<?php endwhile; // end of the loop. ?>

	</div>
		<!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
