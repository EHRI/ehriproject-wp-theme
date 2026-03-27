<?php
/**
 * Global query options.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'ehriproject_posts_per_page' ) ) {
	/**
	 * Set the default posts_per_page number.
	 *
	 * @param WP_Query $query the query.
	 *
	 * @return void
	 */
	function ehriproject_posts_per_page( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {
			$query->set( 'posts_per_page', 12 ); // divisible by 2, 3, 4.
		}
	}
	add_action( 'pre_get_posts', 'ehriproject_posts_per_page' );
}
