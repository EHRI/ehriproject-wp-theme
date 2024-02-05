<?php 

// Temporarily required to import media from the same host
add_filter( 'http_request_host_is_external', '__return_true' );

function my_theme_setup(){
    add_theme_support('post-thumbnails');

    add_image_size('teaser_desktop_1x', 400, 270, true);
    add_image_size('teaser_desktop_2x', 800, 540, true);
    add_image_size('teaser_tablet_1x', 280, 184, true);
    add_image_size('teaser_tablet_2x', 560, 370, true);
    add_image_size('teaser_mobile_1x', 320, 180, true);
    add_image_size('teaser_mobile_2x', 640, 360, true);

    add_filter('image_size_names_choose', 'ehri_custom_sizes');

    function ehri_custom_sizes($sizes) {
        return array_merge($sizes, array(
            'teaser_desktop_1x' => __('Teaser Desktop 1x'),
            'teaser_desktop_2x' => __('Teaser Desktop 2x'),
            'teaser_tablet_1x' => __('Teaser Tablet 1x'),
            'teaser_tablet_2x' => __('Teaser Tablet 2x'),
            'teaser_mobile_1x' => __('Teaser Mobile 1x'),
            'teaser_mobile_2x' => __('Teaser Mobile 2x'),
        ));
    }

}

add_action('after_setup_theme', 'my_theme_setup');

$includes = [
    'pagination',
    'EP_Walker_Nav_Menu',
];

foreach ($includes as $file) {
    if (!$filepath = locate_template("inc/$file.php")) {
        trigger_error("Error locating /inc/$file.php", E_USER_ERROR);
    }

    require_once $filepath;
}