<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package OM Connect Theme
 */

get_header(); ?>

	<div class="row">
	<div class="content-wrap" data-equalizer>

		<!-- Main Blog Content -->
		<div class="medium-8 columns content" role="content" data-equalizer-watch>

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'om-connect' ), single_tag_title( '', false ) ); ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'parts/content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					om_connect_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'parts/content', 'none' );

				endif;
			?>
		</div>
		<!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>