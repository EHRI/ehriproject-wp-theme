<?php
/**
 * The header for our theme.
 *
 * @package ehriproject-wp-theme
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<?php $home = get_home_url(); ?>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo esc_url( get_theme_file_uri( 'favicon.png' ) ); ?>" type="image/png">
	<link rel="canonical" href="<?php echo $home; ?>">
	<link rel="shortlink" href="<?php echo $home; ?>">
	<meta name="dcterms.title" content="European Holocaust Research Infrastructure">
	<meta name="dcterms.type" content="Text">
	<meta name="dcterms.format" content="text/html">
	<meta name="dcterms.identifier" content="<?php echo $home; ?>/">

	<?php ehriproject_render_open_graph_meta(); ?>

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
	<a class="skip-link sr-only sr-only-focusable" href="#main-content">
		<?php esc_html_e( 'Skip to main content', 'ehriproject' ); ?>
	</a>
	<header class="main header" id="header">
		<div class="banner">
			<div class="logo">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( get_theme_file_uri( 'images/ehri-logo-ng.svg' ) ); ?>"
						alt="EHRI Logo"
						title="<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>
		</div>
		<nav class="nav main-navbar navbar-container">
			<label for="hamburger-toggle" class="sr-only">Toggle navigation menu</label>
			<input id="hamburger-toggle" class="hamburger-toggle" type="checkbox" aria-label="Toggle navigation menu" aria-expanded="false"/>
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
							'walker'     => new Ehri_Project_Icon_Menu_Walker(),
						)
					);
					?>
					<li class="menu-item menu-item-search <?php echo is_search() ? 'current-menu-item' : ''; ?>"
						id="menu-item-search">
						<a class="menu-item-link" href="<?php echo esc_url( get_home_url() . '?s=' ); ?>">
							<i class="fa fa-search" aria-hidden="true"></i>
							<?php esc_html_e( 'Search', 'ehriproject' ); ?>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
