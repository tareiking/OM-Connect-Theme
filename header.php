<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package OM Connect Theme
 */

?><!doctype html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-header text-center row">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

		<?php if ( get_header_image() ) { ?>
			<img class="site-logo" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>">
		<?php } ?>

		<h2 class="site-title">
			<?php echo get_bloginfo( 'name', 'display' ); ?>
		</h2>

	</a>

</div>

<div <?php om_connect_top_bar( 'contain-to-grid' );?>>
	<nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">
		<ul class="title-area">
			<!-- Title Area -->
			<li class="name">
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

		<section class="top-bar-section">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'primary-menu',
				'fallback_cb'    => '',
			)
		); ?>
		</section>
	</nav>
</div>

	<!-- End Top Bar -->

<div class="row featured-image-wrap">
	<?php echo om_connect_show_featured_image(); ?>
</div>
