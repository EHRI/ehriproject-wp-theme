<?php
/**
 * Queries for reproducing the Drupal homepage teasers and news sections.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'ehriproject_homepage_teaser_args' ) ) {
	/**
	 * Get the arguments for the homepage teaser query.
	 *
	 * @param int $limit The number of posts to return.
	 *
	 * @return array The query arguments.
	 */
	function ehriproject_homepage_teaser_args( $limit = 6 ) {
		global $wpdb;

		$transient_key = 'ehriproject_homepage_teaser_args_' . $limit;
		$results       = get_transient( $transient_key );

		if ( false === $results ) {
			// Write some custom SQL to fetch the posts we actually want on the front page, in order
			// to match the (buggy) Drupal homepage teasers view. The logic for this incorporates the
			// inherent randomness of comparing NULL values in MySQL, which is why we need to use a
			// custom ORDER BY clause.
			// We also ensure that all front-page items have a featured image.
			$results = $wpdb->get_results( // phpcs:ignore WordPress.DB.DirectDatabaseQuery
				$wpdb->prepare(
					"
            SELECT DISTINCT p.ID
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->term_relationships} rels ON (p.ID = rels.object_id)
            LEFT JOIN {$wpdb->postmeta} pm1 ON (p.ID = pm1.post_id AND pm1.meta_key = '_promote_to_home')
            LEFT JOIN {$wpdb->postmeta} pm2 ON (p.ID = pm2.post_id AND pm2.meta_key = '_homepage_order')
            LEFT JOIN {$wpdb->postmeta} pm3 ON (p.ID = pm3.post_id AND pm3.meta_key = '_thumbnail_id')
            WHERE p.post_type IN ('post', 'page')
            AND p.post_status = 'publish'
            AND (pm1.meta_value = 'yes')
            AND (pm3.meta_value IS NOT NULL)
            ORDER BY
                CASE WHEN pm2.meta_value IS NOT NULL THEN 0 ELSE 1 END,
                pm2.meta_value ASC,
                p.post_date DESC
            LIMIT %d",
					$limit
				)
			);
			set_transient( $transient_key, $results, HOUR_IN_SECONDS );
		}

		// Now we've got the post IDs, we can fetch the full post objects.
		return array(
			'post__in'       => wp_list_pluck( $results, 'ID' ),
			'post_type'      => array( 'post', 'page' ),
			'orderby'        => 'post__in',
			'posts_per_page' => $limit,
		);
	}
}

if ( ! function_exists( 'ehriproject_homepage_news_args' ) ) {
	/**
	 * Get the arguments for the homepage news query.
	 *
	 * @param int $limit The number of posts to return.
	 *
	 * @return array The query arguments.
	 */
	function ehriproject_homepage_news_args( $limit = 6 ) {
		// List all posts in the 'news' category.
		return array(
			'post_type'           => 'post',
			'category_name'       => 'news',
			'posts_per_page'      => $limit,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'status'              => 'publish',
			// include sticky.
			'ignore_sticky_posts' => 0,
		);
	}
}
