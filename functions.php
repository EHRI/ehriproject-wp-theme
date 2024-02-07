<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('ehriproject_teaser_image_data')) {
    function ehriproject_teaser_image_data() {
        return array(
            'teaser_desktop_1x' => array(
                'name' => __('Teaser Desktop 1x'),
                'width' => 400,
                'height' => 270,
                'media' => '(min-width: 992px)',
            ),
            'teaser_desktop_2x' => array(
                'name' => __('Teaser Desktop 2x'),
                'width' => 800,
                'height' => 540,
                'media' => '(min-width: 992px)',
            ),
            'teaser_tablet_1x' => array(
                'name' => __('Teaser Tablet 1x'),
                'width' => 280,
                'height' => 184,
                'media' => '(min-width: 768px)',
            ),
            'teaser_tablet_2x' => array(
                'name' => __('Teaser Tablet 2x'),
                'width' => 560,
                'height' => 370,
                'media' => '(min-width: 768px)',
            ),
            'teaser_mobile_1x' => array(
                'name' => __('Teaser Mobile 1x'),
                'width' => 320,
                'height' => 180,
                'media' => '(min-width: 0px)',
            ),
            'teaser_mobile_2x' => array(
                'name' => __('Teaser Mobile 2x'),
                'width' => 640,
                'height' => 360,
                'media' => '(min-width: 0px)',
            ),
        );
    }
}


// Temporarily required to import media from the same host
add_filter( 'http_request_host_is_external', '__return_true' );

function ehri_theme_setup() {
    add_theme_support('post-thumbnails', array('post', 'page'));

    foreach (ehriproject_teaser_image_data() as $key => $value) {
        add_image_size($key, $value['width'], $value['height'], true);
    }

    add_filter('image_size_names_choose', 'ehri_custom_sizes');

    function ehri_custom_sizes($sizes) {
        $ehri_teaser_image_size_names = array();
        foreach (ehriproject_teaser_image_data() as $key => $value) {
            $ehri_teaser_image_size_names[$key] = $value['name'];
        }
        return array_merge($sizes, $ehri_teaser_image_size_names);
    }
}

add_action('after_setup_theme', 'ehri_theme_setup');


if ( ! function_exists('ehriproject_setup_theme_default_settings') ) {
    function ehriproject_setup_theme_default_settings() {

        // check if settings are set, if not set defaults.
        // Caution: DO NOT check existence using === always check with == .
        // Latest blog posts style.
        $ehriproject_teaser_images = get_theme_mod( 'ehriproject_teaser_images' );
        if ( '' == $ehriproject_teaser_images ) {
            set_theme_mod( 'ehriproject_teaser_images', 'default' );
        }
    }
}


$ehriproject_includes = [
    'pagination',
    'widgets'
];

foreach ($ehriproject_includes as $file) {
    if (!$filepath = locate_template("inc/$file.php")) {
        trigger_error("Error locating /inc/$file.php", E_USER_ERROR);
    }

    require_once $filepath;
}