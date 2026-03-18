<?php
/**
 * Front page template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// The entire front page is built in the WordPress editor, so
// no page chrome is added here.
the_content();
