<?php 

// Temporarily required to import media from the same host
add_filter( 'http_request_host_is_external', '__return_true' );

function my_theme_setup(){
    add_theme_support('post-thumbnails');
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