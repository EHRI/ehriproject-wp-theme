<?php
/**
 * Customise WordPress search.
 *
 * @package ehriproject-wp-theme
 */

if ( ! function_exists( 'ehriproject_customize_empty_search' ) ) {
	/**
	 * Set parameters for an empty search page.
	 *
	 * @param WP_Query $query the query.
	 *
	 * @return void
	 */
	function ehriproject_customize_empty_search( WP_Query $query ) {
		if ( $query->is_search() && ! is_admin() && $query->is_main_query() ) {
			$query->set( 'posts_per_page', 12 ); // divisible by 2, 3, 4.

			// Check if search query is empty.
			if ( empty( $query->get( 's' ) ) ) {
				// Option A: Show recent posts.
				$query->set( 'orderby', 'date' );
				$query->set( 'order', 'DESC' );

				// Only show posts.
				$query->set( 'post_type', 'post' );
			}
		}
	}

	add_action( 'pre_get_posts', 'ehriproject_customize_empty_search' );
}
