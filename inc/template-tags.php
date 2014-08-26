<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package OM Connect Theme
 */

if ( ! function_exists( 'om_connect_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function om_connect_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation row" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'sennzaversion3' ); ?></h1>
		<div class="nav-links medium-12 columns">

			<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
				<?php wp_pagenavi(); ?>
			<?php } else { ?>

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'sennzaversion3' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'sennzaversion3' ) ); ?></div>
				<?php endif; ?>
			<?php } ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif; // om_connect_paging_nav

if ( ! function_exists( 'om_connect_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function om_connect_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation row" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'sennzaversion3' ); ?></h1>
		<div class="nav-links medium-12 columns">
			<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
				<?php wp_pagenavi(); ?>
			<?php } else { ?>
				<?php previous_post_link( '%link', _x( '<span class="page-left">%title</span>', 'Previous post link', 'sennzaversion3' ) ); ?>
				<?php next_post_link(     '%link', _x( '<span class="page-right">%title</span>', 'Next post link',     'sennzaversion3' ) ); ?>
			<?php } ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif; // om_connect_post_nav

if ( ! function_exists( 'om_connect_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function om_connect_posted_on() {

	if ( ! post_password_required() && ( '0' != get_comments_number() ) ) {
		if ( get_comments_number() > '10' ) {
			echo "<span class='comment-count more-than-10-comments'><a href='" . get_comments_link() ."' title='Leave a comment'>" . get_comments_number() . "</a></span>";
		}
		else {
			echo "<span class='comment-count'><a href='" . get_comments_link() ."' title='Leave a comment'>" . get_comments_number() . "</a></span>";
		}
	}

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on"><i class="fa fa-calendar"></i> %1$s</span> <span class="byline"> <i class="fa fa-user"></i> %2$s</span>', 'sennzaversion3' ),
		sprintf( '%1$s',
			$time_string
		),
		sprintf( '<span class="author"><a href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

if ( ! function_exists( 'om_connect_read_more_link' ) ) :
/**
 * Return a "Read More" link for excerpts.
 *
 * @return string "Read More" link.
 */
function om_connect_read_more_link() {
	return '<a href="'. get_permalink() . '" title="' . esc_attr( get_the_title() ) . '"> ' . __( 'Read More', 'om-connect' ) . '</a>';
}
endif;

/**
 * Replace "[...]" with an ellipsis and om_connect_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @param string $more The Read More text.
 * @return string An ellipsis.
 */
function om_connect_auto_excerpt_more( $more ) {
	return ' &hellip;' . om_connect_read_more_link();
}
add_filter( 'excerpt_more', 'om_connect_auto_excerpt_more' );

/**
 * Add a pretty "Read More" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @param string $output The "Read More" link.
 * @return string Excerpt with a pretty "Read More" link.
 */
function om_connect_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= om_connect_read_more_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'om_connect_custom_excerpt_more' );

/**
 * Returns true if a blog has more than 1 category
 */
function om_connect_categorized_blog() {
	if ( false === ( $all_om_connect_categories = get_transient( 'om_connect_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_om_connect_categories = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_om_connect_categories = count( $all_om_connect_categories );

		set_transient( 'om_connect_cats', $all_om_connect_categories );
	}

	if ( '1' != $all_om_connect_categories ) {
		// This blog has more than 1 category so _s_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so _s_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in om_connect_categorized_blog
 */
function om_connect_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'om_connect_cats' );
}
add_action( 'edit_category', 'om_connect_category_transient_flusher' );
add_action( 'save_post',     'om_connect_category_transient_flusher' );

/**
 * Echo out our custom classes if there are any
 *
 * @param string $class
 */
function om_connect_top_bar( $class = '' ) {
	// Separates classes with a single space, collates classes for body element
	echo 'class="' . join( ' ', get_om_connect_top_bar( $class ) ) . '"';
}

/**
 * OM Connect Top Bar Options
 *
 */
function get_om_connect_top_bar( $class = '' ) {

	$classes = array();

	if ( current_theme_supports( 'foundation-sticky-top-bar' ) ){
		$classes[] = 'sticky';
	}

	if ( ! empty( $class ) ) {
		if ( !is_array( $class ) )
			$class = preg_split( '#\s+#', $class );
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	return apply_filters( 'om_connect_top_bar', $classes, $class );
}

if ( ! function_exists( 'om_connect_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own om_connect_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function om_connect_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'om-connect' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'om-connect' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'om-connect' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'om-connect' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'om-connect' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'om-connect' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'om-connect' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

// Featured image: Add featured image to beginning of content
function om_connect_add_image_to_content( $content ){

	$prepend = the_post_thumbnail( 'featured-image' );

	$new_content = $prepend . $content;

	return $new_content;

}

// Featured image: Check if image is vertical
function om_connect_check_image_is_vertical(){

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'featured-image' );

	if ( $image && ( $image[2] > $image[1] ) ) { // Image height > Image width
		add_filter( 'the_content', 'om_connect_add_image_to_content' );
		return false;

	} else {

		return the_post_thumbnail( 'featured-image' );
	}

}

// Featured image: Show image in header area
function om_connect_show_featured_image(){
	// If the blog, explicitly use the thumbnail for blog
	if ( is_home() && has_post_thumbnail( get_option( 'page_for_posts' ) ) ) {

		return get_the_post_thumbnail( get_option( 'page_for_posts' ), 'featured-image' ) ;

	} else {
		return om_connect_check_image_is_vertical();
	}
}