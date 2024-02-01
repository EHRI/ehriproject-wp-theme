<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists("EP_Walker_Nav_Menu")) {


    class EP_Walker_Nav_Menu extends Walker_Nav_Menu
    {

        // Add custom HTML for the start of a level
        function start_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"submenu\">\n";
        }

        // Add custom HTML for the start of an element
        function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0)
        {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names . '>';

            $atts = array();
            $atts['title'] = !empty($item->title) ? esc_attr($item->title) : '';
            $atts['target'] = !empty($item->target) ? esc_attr($item->target) : '';
            $atts['rel'] = !empty($item->xfn) ? esc_attr($item->xfn) : '';
            $atts['href'] = !empty($item->url) ? esc_url($item->url) : '';

            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (!empty($value)) {
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        // Add custom HTML for the end of a level
        function end_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

// Add custom HTML for the end of an element
        function end_el(&$output, $item, $depth = 0, $args = null)
        {
            $output .= "</li>\n";
        }
    }
}
