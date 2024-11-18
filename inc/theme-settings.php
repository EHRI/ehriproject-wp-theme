<?php
/**
 * Check and setup theme's default settings
 *
 * @package ehriproject
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'ehriproject_setup_theme_default_settings' ) ) {
	function ehriproject_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .

        // Twitter URL
        $ehriproject_twitter_url = get_theme_mod( 'ehriproject_twitter_url' );
        if ( $ehriproject_twitter_url == '' ) {
            set_theme_mod( 'ehriproject_twitter_url', '' );
        }

        // Bluesky URL
        $ehriproject_twitter_url = get_theme_mod( 'ehriproject_bluesky_url' );
        if ( $ehriproject_twitter_url == '' ) {
            set_theme_mod( 'ehriproject_bluesky_url', '' );
        }

        // LinkedIn URL
        $ehriproject_linkedin_url = get_theme_mod( 'ehriproject_linkedin_url' );
        if ( $ehriproject_linkedin_url == '' ) {
            set_theme_mod( 'ehriproject_linkedin_url', '' );
        }

		// Facebook URL
		$ehriproject_facebook_url = get_theme_mod( 'ehriproject_facebook_url' );
		if ( $ehriproject_facebook_url == '' ) {
			set_theme_mod( 'ehriproject_facebook_url', '' );
		}
	}
}
