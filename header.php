<?php
/**
 * The header for our theme.
 *
 * @package ehriproject-wp-theme
 */

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<?php $home = get_home_url(); ?>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo get_theme_file_uri( 'favicon.png' ); ?>" type="image/png">
	<link rel="canonical" href="<?php echo $home; ?>">
	<link rel="shortlink" href="<?php echo $home; ?>">
	<meta name="dcterms.title" content="European Holocaust Research Infrastructure">
	<meta name="dcterms.type" content="Text">
	<meta name="dcterms.format" content="text/html">
	<meta name="dcterms.identifier" content="<?php echo $home; ?>/">

	<meta name="MobileOptimized" content="width">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width">

	<?php wp_head(); ?>

	<?php $plausible_domain = get_theme_mod( 'ehriproject_plausible_domain' ); ?>
	<?php if ( $plausible_domain ) : ?>
		<script async defer data-domain="<?php echo $plausible_domain; ?>" src="https://plausible.io/js/plausible.js"></script>
	<?php endif; ?>
</head>
<body <?php body_class( array( 'html' ) ); ?>>
	<header class="main header" id="header" role="banner">
		<div class="banner">
			<div class="logo">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( get_theme_file_uri( 'images/ehri-logo.svg' ) ); ?>" alt="EHRI Logo"/></a>
			</div>
			<a href="<?php echo esc_url( home_url() ); ?>" class="title"><?php bloginfo( 'name' ); ?></a>
		</div>
		<nav class="nav main-navbar navbar-container" role="navigation">
			<label for="hamburger-toggle">Show menu</label>
			<input id="hamburger-toggle" class="hamburger-toggle" type="checkbox"/>
			<span class="hamburger-part"></span>
			<span class="hamburger-part"></span>
			<span class="hamburger-part"></span>

			<div class="navbar">
				<ul class="text-items header-menu">
					<?php $menu_page = get_queried_object(); ?>
					<?php foreach ( wp_get_nav_menu_items( 'main-menu' ) as $menu_item ) : ?>
						<li class="header-menu-item	<?php echo ( $menu_page->ID === $menu_item->object_id ? 'active' : '' ); ?>">
							<a href="<?php echo esc_url( $menu_item->url ); ?>">
								<?php echo esc_html( $menu_item->title ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php get_template_part( 'social' ); ?>
			</div>
		</nav>
	</header>
