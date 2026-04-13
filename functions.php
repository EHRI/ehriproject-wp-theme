<?php
/**
 * EHRI Project Theme Functions
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$ehriproject_includes = array(
	'pagination',
	'queries',
	'customizer',
	'theme-settings',
	'top-bar',
	'search',
	'class-ehri-project-icon-menu-walker',
	'template-tags',
);

foreach ( $ehriproject_includes as $file ) {
	$filepath = locate_template( "inc/$file.php" );
	if ( ! $filepath ) {
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		trigger_error( "Error locating /inc/$file.php", E_USER_ERROR );
	}

	require_once $filepath;
}

if ( ! function_exists( 'ehriproject_enqueue_styles' ) ) {
	/**
	 * Enqueue theme scripts and styles.
	 */
	function ehriproject_enqueue_styles() {
		wp_enqueue_style( 'ehriproject-wp-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	}

	add_action( 'wp_enqueue_scripts', 'ehriproject_enqueue_styles' );
}

if ( ! function_exists( 'ehriproject_front_page_hero_assets_path' ) ) {
	/**
	 * Add a snippet to load background images on the
	 * front page hero section.
	 */
	function ehriproject_front_page_hero_assets_path() {
		$theme_uri = get_template_directory_uri();

		$custom_css = "
        :root {
            --hero-bg-1: url('{$theme_uri}/images/hero/blocks-p1-o.svg');
            --hero-bg-2: url('{$theme_uri}/images/hero/blocks-p2-o.svg');
            --hero-bg-3: url('{$theme_uri}/images/hero/blocks-p3-o.svg');
        }";

		wp_add_inline_style( 'ehriproject-wp-style', $custom_css );
		wp_add_inline_style( 'ehriproject-front-page-hero-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'ehriproject_front_page_hero_assets_path' );
add_action( 'enqueue_block_editor_assets', 'ehriproject_front_page_hero_assets_path' );


if ( ! function_exists( 'ehriproject_theme_setup' ) ) {
	/**
	 * Theme setup function.
	 */
	function ehriproject_theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

		// Override WP defaults to be 16:9.
		update_option( 'thumbnail_size_w', 150 );
		update_option( 'thumbnail_size_h', 150 );
		update_option( 'thumbnail_crop', 1 );

		update_option( 'medium_size_w', 480 );
		update_option( 'medium_size_h', 270 );
		update_option( 'medium_crop', 0 );

		update_option( 'medium_large_size_w', 768 );
		update_option( 'medium_large_size_h', 432 );
		update_option( 'large_crop', 0 );

		update_option( 'large_size_w', 1024 );
		update_option( 'large_size_h', 576 );
		update_option( 'large_crop', 0 );

		// Custom sizes.
		add_image_size( 'card', 640, 360, true );
		add_image_size( 'wide', 1280, 720, true );
		add_image_size( 'og-image', 1200, 630, true );
		add_image_size( 'full-hd', 1920, 1080, true );
	}
}

add_action( 'after_setup_theme', 'ehriproject_theme_setup' );

if ( ! function_exists( 'ehriproject_setup_theme_default_settings' ) ) {
	/**
	 * Set up default theme settings.
	 *
	 * This function checks if the theme settings are set, and if not,
	 * it sets the default values.
	 */
	function ehriproject_setup_theme_default_settings() {
		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$ehriproject_teaser_images = get_theme_mod( 'ehriproject_teaser_images' );
		if ( '' === $ehriproject_teaser_images ) {
			set_theme_mod( 'ehriproject_teaser_images', 'default' );
		}
	}
}


if ( ! function_exists( 'ehriproject_register_gallery_item_post_type' ) ) {
	/**
	 * Register a new custom post type for 'gallery_item'.
	 */
	function ehriproject_register_gallery_item_post_type() {
		$labels = array(
			'name'               => __( 'Gallery Items' ),
			'singular_name'      => __( 'Gallery Item' ),
			'add_new'            => __( 'Add New' ),
			'add_new_item'       => __( 'Add New Gallery Item' ),
			'edit_item'          => __( 'Edit Gallery Item' ),
			'new_item'           => __( 'New Gallery Item' ),
			'all_items'          => __( 'All Gallery Items' ),
			'view_item'          => __( 'View Gallery Item' ),
			'search_items'       => __( 'Search Gallery Items' ),
			'not_found'          => __( 'No gallery items found' ),
			'not_found_in_trash' => __( 'No gallery items found in Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Gallery Items',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => false,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'gallery_item' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
		);

		register_post_type( 'gallery_item', $args );
	}
}

if ( ! function_exists( 'ehriproject_register_video_post_type' ) ) {
	/**
	 * Register a new custom post type for 'video'.
	 */
	function ehriproject_register_video_post_type() {
		$labels = array(
			'name'               => __( 'Videos' ),
			'singular_name'      => __( 'Video' ),
			'add_new'            => __( 'Add New' ),
			'add_new_item'       => __( 'Add New Video' ),
			'edit_item'          => __( 'Edit Video' ),
			'new_item'           => __( 'New Video' ),
			'all_items'          => __( 'All Videos' ),
			'view_item'          => __( 'View Video' ),
			'search_items'       => __( 'Search Videos' ),
			'not_found'          => __( 'No videos found' ),
			'not_found_in_trash' => __( 'No videos found in Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Videos',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => false,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'video' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
		);

		register_post_type( 'video', $args );
	}
}

if ( ! function_exists( 'ehriproject_register_newsletter_edition_taxonomy' ) ) {
	/**
	 * Register a new taxonomy for 'newsletter_edition'.
	 *
	 * This taxonomy is used to categorize posts and pages by newsletter edition.
	 */
	function ehriproject_register_newsletter_edition_taxonomy() {
		$labels = array(
			'name'              => _x( 'Newsletter Editions', 'taxonomy general name' ),
			'singular_name'     => _x( 'Newsletter Edition', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Newsletter Editions' ),
			'all_items'         => __( 'All Newsletter Editions' ),
			'parent_item'       => __( 'Parent Newsletter Edition' ),
			'parent_item_colon' => __( 'Parent Newsletter Edition:' ),
			'edit_item'         => __( 'Edit Newsletter Edition' ),
			'update_item'       => __( 'Update Newsletter Edition' ),
			'add_new_item'      => __( 'Add New Newsletter Edition' ),
			'new_item_name'     => __( 'New Newsletter Edition Name' ),
			'menu_name'         => __( 'Newsletter Editions' ),
		);

		$args = array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => false,
			'closed'       => true,
			'show_in_menu' => true,
			'query_var'    => true,
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'newsletter-edition' ),
			'default'      => array(
				'name' => __( 'None' ),
				'slug' => __( 'none' ),
			),
		);

		register_taxonomy( 'newsletter_edition', array( 'post', 'page' ), $args );
	}
}

if ( ! function_exists( 'ehriproject_register_newsletter_category_taxonomy' ) ) {
	/**
	 * Register a new taxonomy for 'newsletter_category'.
	 *
	 * This taxonomy is used to categorize posts and pages by newsletter category.
	 */
	function ehriproject_register_newsletter_category_taxonomy() {
		$labels = array(
			'name'              => _x( 'Newsletter Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Newsletter Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Newsletter Categories' ),
			'all_items'         => __( 'All Newsletter Categories' ),
			'parent_item'       => __( 'Parent Newsletter Category' ),
			'parent_item_colon' => __( 'Parent Newsletter Category:' ),
			'edit_item'         => __( 'Edit Newsletter Category' ),
			'update_item'       => __( 'Update Newsletter Category' ),
			'add_new_item'      => __( 'Add New Newsletter Category' ),
			'new_item_name'     => __( 'New Newsletter Category Name' ),
			'menu_name'         => __( 'Newsletter Categories' ),
		);

		$args = array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => false,
			'closed'       => true,
			'query_var'    => true,
			'show_in_rest' => false,
			'rewrite'      => array( 'slug' => 'newsletter-category' ),
			'show_in_menu' => false,
		);

		register_taxonomy( 'newsletter_category', array( 'post', 'page' ), $args );
	}
}

if ( ! function_exists( 'ehriproject_register_fellowship_year_taxonomy' ) ) {
	/**
	 * Register a new taxonomy for 'fellowship_year'.
	 *
	 * This taxonomy is used to categorize posts and pages by fellowship year.
	 */
	function ehriproject_register_fellowship_year_taxonomy() {
		$labels = array(
			'name'              => _x( 'Fellowship Years', 'taxonomy general name' ),
			'singular_name'     => _x( 'Fellowship Year', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Fellowship Years' ),
			'all_items'         => __( 'All Fellowship Years' ),
			'parent_item'       => __( 'Parent Fellowship Year' ),
			'parent_item_colon' => __( 'Parent Fellowship Year:' ),
			'edit_item'         => __( 'Edit Fellowship Year' ),
			'update_item'       => __( 'Update Fellowship Year' ),
			'add_new_item'      => __( 'Add New Fellowship Year' ),
			'new_item_name'     => __( 'New Fellowship Year Name' ),
			'menu_name'         => __( 'Fellowship Years' ),
		);

		$args = array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => true,
			'closed'       => true,
			'query_var'    => 'fellowship-year',
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'fellowship-year' ),
			'show_in_menu' => true,
		);

		register_taxonomy( 'fellowship_year', array( 'post', 'page' ), $args );
	}
}

if ( ! function_exists( 'ehriproject_register_fellowship_institution_taxonomy' ) ) {
	/**
	 * Register a new taxonomy for 'fellowship_institution'.
	 *
	 * This taxonomy is used to categorize posts and pages by fellowship institution.
	 */
	function ehriproject_register_fellowship_institution_taxonomy() {
		$labels = array(
			'name'              => _x( 'Fellowship Institutions', 'taxonomy general name' ),
			'singular_name'     => _x( 'Fellowship Institution', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Fellowship Institutions' ),
			'all_items'         => __( 'All Fellowship Institutions' ),
			'parent_item'       => __( 'Parent Fellowship Institution' ),
			'parent_item_colon' => __( 'Parent Fellowship Institution:' ),
			'edit_item'         => __( 'Edit Fellowship Institution' ),
			'update_item'       => __( 'Update Fellowship Institution' ),
			'add_new_item'      => __( 'Add New Fellowship Institution' ),
			'new_item_name'     => __( 'New Fellowship Institution Name' ),
			'menu_name'         => __( 'Fellowship Institutions' ),
		);

		$args = array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => true,
			'closed'       => true,
			'query_var'    => 'fellowship-institution',
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'fellowship-institution' ),
			'show_in_menu' => true,
		);

		register_taxonomy( 'fellowship_institution', array( 'post', 'page' ), $args );
	}
}

add_action( 'init', 'ehriproject_register_gallery_item_post_type' );
add_action( 'init', 'ehriproject_register_video_post_type' );
add_action( 'init', 'ehriproject_register_newsletter_edition_taxonomy' );
add_action( 'init', 'ehriproject_register_newsletter_category_taxonomy' );
add_action( 'init', 'ehriproject_register_fellowship_year_taxonomy' );
add_action( 'init', 'ehriproject_register_fellowship_institution_taxonomy' );

/**
 * Blocks!
 */
if ( ! function_exists( 'ehriproject_create_blocks_block_init' ) ) {
	/**
	 * Register custom blocks.
	 */
	function ehriproject_create_blocks_block_init() {
		register_block_type( __DIR__ . '/build/front-page-hero' );
		register_block_type( __DIR__ . '/build/front-page-resource' );
	}
}
add_action( 'init', 'ehriproject_create_blocks_block_init' );


// Add support for excerpts on pages.
add_post_type_support( 'page', 'excerpt' );

if ( ! function_exists( 'ehriproject_add_custom_favicons' ) ) {
	/**
	 * Add favicon files that should've been uploaded to the WordPress root
	 * directory.
	 */
	function ehriproject_add_custom_favicons() {
		echo '
    <link rel="icon" href="' . get_site_url() . '/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="' . get_site_url() . '/apple-touch-icon.png">
    ';
	}
}
add_action( 'wp_head', 'ehriproject_add_custom_favicons' );

// Disable users sitemaps.
add_filter(
	'wp_sitemaps_add_provider',
	function ( $provider, $name ) {
		if ( 'users' === $name ) {
			return false;
		}
		return $provider;
	},
	10,
	2
);

add_filter(
	'wp_sitemaps_register_providers',
	function ( $providers ) {
		unset( $providers['users'] );
		return $providers;
	}
);
