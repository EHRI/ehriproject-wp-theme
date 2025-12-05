<?php
/**
 * EHRI Project Menu config.
 *
 * @package ehriproject-wp-theme
 */

/**
 * Custom menu walker that renders an icon along with the description all
 * within one link.
 */
class Ehri_Project_Icon_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Render menu items.
	 *
	 * @param string     $output the menu markup output.
	 * @param WP_Post    $item the menu item.
	 * @param int        $depth the menu item depth.
	 * @param array|null $args arguments.
	 * @param int        $id an identifier.
	 *
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= '<li' . $class_names . '>';

		$attributes  = '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';

		$item_output = '<a' . $attributes . '>';

		if ( $depth > 0 ) {
			foreach ( $item->classes as $class_name ) {
				if ( substr( $class_name, 0, 8 ) === 'icon-fa-' ) {
					$fa_class     = 'fa-' . substr( $class_name, 8 );
					$item_output .= '<i class="fa fa-fw ' . $fa_class . '"></i>';
					break;
				}
			}
		}

		// Add title.
		$item_output .= '<span class="menu-title">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';

		// Add description if exists.
		if ( ! empty( $item->description ) ) {
			$item_output .= '<span class="menu-description">' . esc_html( $item->description ) . '</span>';
		}

		$item_output .= '</a>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
//
//if ( ! function_exists( 'ehriproject_add_description_to_menu' ) ) {
//	/**
//	 * Add a description for menu items that have that attribute set.
//	 *
//	 * @param string   $item_output the existing text.
//	 * @param WP_Post  $item the menu item.
//	 * @param int      $depth the current depth.
//	 * @param stdClass $args additional arguments.
//	 *
//	 * @return mixed|string
//	 */
//	function ehriproject_add_description_to_menu( $item_output, $item, $depth, $args ) {
//
//		if ( $depth > 0 ) {
//			$fa_class = '';
//			foreach ( $item->classes as $class_name ) {
//				if ( substr( $class_name, 0, 8 ) === 'icon-fa-' ) {
//					$fa_class = 'fa-' . substr( $class_name, 8 );
//					break;
//				}
//			}
//			$item_output = '<i class="fa fa-fw ' . $fa_class . '"></i>' . $item_output;
//		}
//
//		if ( strlen( $item->description ) > 0 ) {
//			// append description after link.
//			$item_output .= sprintf( '<span class="description">%s</span>', esc_html( $item->description ) );
//		}
//
//		return $item_output;
//	}
//}
//add_filter( 'walker_nav_menu_start_el', 'ehriproject_add_description_to_menu', 10, 4 );
