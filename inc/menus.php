<?php
/**
 * EHRI Project Menu config.
 *
 * @package ehriproject-wp-theme
 */

if ( ! function_exists( 'ehriproject_add_description_to_menu' ) ) {
	/**
	 * Add a description for menu items that have that attribute set.
	 *
	 * @param string   $item_output the existing text.
	 * @param WP_Post  $item the menu item.
	 * @param int      $depth the current depth.
	 * @param stdClass $args additional arguments.
	 *
	 * @return mixed|string
	 */
	function ehriproject_add_description_to_menu( $item_output, $item, $depth, $args ) {

		if ( $depth > 0 ) {
			$fa_class = '';
			foreach ($item->classes as $class_name) {
				if (substr($class_name, 0, 8) === 'icon-fa-') {
					$fa_class = 'fa-' . substr($class_name, 8);
					break;
				}
			}
			$item_output = '<i class="fa fa-fw ' . $fa_class . '"></i>' . $item_output;
		}

		if ( strlen( $item->description ) > 0 ) {
			// append description after link.
			$item_output .= sprintf( '<span class="description">%s</span>', esc_html( $item->description ) );
		}

		return $item_output;
	}
}
add_filter( 'walker_nav_menu_start_el', 'ehriproject_add_description_to_menu', 10, 4 );
