<?php

// Add this code to your theme's functions.php file or in a site-specific plugin

function add_custom_link_to_admin_bar($wp_admin_bar) {
    // Check if user is logged in and has appropriate permissions
    if (!is_user_logged_in() || !current_user_can('manage_options')) {
        return;
    }

    // Add the parent menu item
    $args = array(
        'id'    => 'ehri-docs',
        'title' => 'EHRI Site Documentation',
        'href'  => 'https://documentation.ehri-project.eu/en/latest/project/',
        'meta'  => array(
            'title' => 'Information about the EHRI Project site',
            'target' => '_blank',            // Optional: opens in new tab
        )
    );

    $wp_admin_bar->add_node($args);

    // Optional: Add a submenu item
    $args = array(
        'id'     => 'ehri-docs-forms',
        'parent' => 'ehri-docs',
        'title'  => 'How to use Contact Form 7',
        'href'   => 'https://documentation.ehri-project.eu/en/latest/project/cf7-tutorial/',
        'meta'   => array(
            'title' => 'A tutorial on making and posting forms with Contact Form 7 and Flamingo'
        )
    );

    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'add_custom_link_to_admin_bar', 999);