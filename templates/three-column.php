<?php
/**
 * Template Name: 3 Column
 *
 * Template with 2 sidebars on either side of content
 *
 * @package OM Connect Theme
 */

get_header(); ?>
	<div class="row">
	<div class="content-wrap" data-equalizer>

	<?php get_sidebar( 'three-column' ); ?>

		<!-- Main Blog Content -->
		<div class="medium-6 columns content" role="content" data-equalizer-watch>

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

<?php get_sidebar( 'page' ); ?>
<?php get_footer(); ?>
