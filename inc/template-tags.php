<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'ehriproject_render_open_graph_meta' ) ) {
	/**
	 * Generate Open Graph meta tags.
	 */
	function ehriproject_render_open_graph_meta() {
		$og_data = array(
			'locale'    => 'en-GB',
			'site_name' => get_bloginfo( 'name' ),
			'title'     => wp_filter_nohtml_kses( get_the_title() ),
		);

		if ( is_single() ) {
			$og_data['description']                = wp_filter_nohtml_kses( get_the_excerpt() );
			$og_data['image']                      = has_post_thumbnail()
				? get_the_post_thumbnail_url( get_the_ID(), 'large' )
				: get_theme_file_uri( 'images/ehriproject-card.png' );
			$og_data['url']                        = get_the_permalink();
			$og_data['type']                       = 'article';
				$og_data['article:published_time'] = get_the_date( 'c' );
			$og_data['article:modified_time']      = get_the_modified_date( 'c' );
		} else {
			$og_data['description'] = get_bloginfo( 'description' );
			$og_data['image']       = get_theme_file_uri( 'images/ehriproject-card.png' );
			$og_data['url']         = get_home_url();
			$og_data['type']        = 'website';
		}

		foreach ( $og_data as $property => $content ) {
			if ( ! empty( $content ) ) {
				printf(
					'<meta property="og:%s" content="%s">' . "\n\t",
					esc_attr( $property ),
					esc_attr( $content )
				);
			}
		}
	}
}
