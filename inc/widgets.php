<?php
/**
 * EHRI custom widgets
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (! function_exists("ehrieric_teaser_element")) {
    function ehrieric_teaser_element($post, $alt_text = "") {
        // Return a <picture> element containing the teaser image sizes. These are hard-coded now to
        // reflect the legacy site but this should be updated when the theme is refreshed.
        $html = '<picture>';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'teaser_desktop_1x') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'teaser_desktop_2x') . ' 2x" media="(min-width: 1200px)">';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'teaser_tablet_1x') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'teaser_tablet_2x') . ' 2x" media="(min-width: 960px)">';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'teaser_mobile_1x') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'teaser_mobile_2x') . ' 2x" media="(min-width: 0px)">';
        $html .= '<img src="' . get_the_post_thumbnail_url($post, 'teaser_mobile_1x') . '" alt="' . $alt_text . '">';
        $html .= '</picture>';
        return $html;
    }
}

if (! function_exists("ehrieric_header_element")) {
    function ehrieric_header_element($post = null, $alt_text = "") {
        // Return a <picture> element containing the header image sizes. These are hard-coded now to
        // reflect the legacy site but this should be updated when the theme is refreshed.
        $html = '<picture>';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'large') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'full') . ' 2x" media="(min-width: 1200px)">';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'medium') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'large') . ' 2x" media="(min-width: 960px)">';
        $html .= '<source srcset="' .
            get_the_post_thumbnail_url($post, 'medium') . ' 1x, ' .
            get_the_post_thumbnail_url($post, 'large') . ' 2x" media="(min-width: 0px)">';
        $html .= '<img src="' . get_the_post_thumbnail_url($post, 'full') . '" alt="' . $alt_text . '">';
        $html .= '</picture>';
        return $html;
    }
}
