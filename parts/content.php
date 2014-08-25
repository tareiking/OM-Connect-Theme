<?php
/**
 * @package OM Connect Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ): ?>

			<div class="entry-featured-image">
				<?php echo the_post_thumbnail(); ?>
			</div>

		<?php endif; ?>

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="entry-meta">
			<?php om_connect_posted_on(); ?>
		</div>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_archive() || is_home() ) : // Only display Excerpts on Search, Archives and Blog ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'om-connect' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'om-connect' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'om-connect' ) );
				if ( $categories_list && om_connect_categorized_blog() ) :
			?>
			<span class="cat-links">
				<i class="fa fa-bars"></i>
				<?php printf( __( ' %1$s', 'om-connect' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'om-connect' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<i class="fa fa-tags"></i>
				<?php printf( __( ' %1$s', 'om-connect' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>

		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'om-connect' ), __( '1 Comment', 'om-connect' ), __( '% Comments', 'om-connect' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'om-connect' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<hr />
