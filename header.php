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
					<img src="<?php echo esc_url( get_theme_file_uri( 'images/ehri-logo-ng.png' ) ); ?>"
						alt="EHRI Logo"
						title="<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>
		</div>
		<nav class="nav main-navbar navbar-container" role="navigation">
			<label for="hamburger-toggle">Show menu</label>
			<input id="hamburger-toggle" class="hamburger-toggle" type="checkbox"/>
			<span class="hamburger-part"></span>
			<span class="hamburger-part"></span>
			<span class="hamburger-part"></span>

			<div class="navbar">
				<ul class="main-menu header-menu" id="main-menu-items">
					<?php
					wp_nav_menu(
						array(
							'menu'       => 'main-menu',
							'container'  => false,
							'items_wrap' => '%3$s', // don't wrap the items in a <ul>.
						)
					);
					?>
					<li class="menu-item menu-item-search" id="menu-item-search">
						<a href="<?php echo esc_url( get_home_url() . '?s=' ); ?>">
							<i class="fa fa-search"></i>
							<?php esc_html_e( 'Search', 'ehriproject' ); ?>
						</a>
<!--						<ul class="search-controls sub-menu">-->
<!--							<li class="menu-item">-->
<!--								<form role="search" method="get" id="search-form" class="search-form" action="--><?php //echo $home; ?><!--">-->
<!--									<label class="screen-reader-text" for="search-input">Search for:</label>-->
<!--									<input type="text" value="" name="s" id="search-input" placeholder="--><?php //esc_html_e( 'Search', 'ehriproject' ); ?><!--">-->
<!--								</form>-->
<!--							</li>-->
<!--						</ul>-->
					</li>
				</ul>
			</div>
		</nav>
	</header>
