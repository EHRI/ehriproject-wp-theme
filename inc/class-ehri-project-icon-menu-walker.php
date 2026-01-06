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

		$attributes  = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ' class="menu-item-link"';

		$item_output = '<a' . $attributes . '>';

		if ( $depth > 0 ) {
			$item_output .= $this->get_icon_markup( $item );
		}

		// Add title.
		$item_output .= '<span class="menu-title">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';

		// Add description if exists.
		if ( ! empty( $item->description ) ) {
			$item_output .= '<span class="menu-description">' . esc_html( $item->description ) . '</span>';
		}

		$item_output .= '</a>';

		// For top level (depth 0) items we are going to append the
		// description as an alternative link (which will appear in
		// the mega menu.
		if ( 0 === $depth ) {
			$alt_link_text   = empty( $item->description ) ? $item->title : $item->description;
			$alt_attributes  = ! empty( $item->url ) ? ' href="' . $item->url . '"' : '';
			$alt_attributes .= ' class="menu-item-link-alt"';
			$alt_attributes .= ! empty( $item->target ) ? ' target=' . esc_attr( $item->target ) : '';
			$item_output    .= '<a' . $alt_attributes . '>';
			$item_output    .= $this->get_icon_markup( $item );
			$item_output    .= '<span class="menu-title-alt">' . esc_html( $alt_link_text ) . '</span></a>';
		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * If the user has included 'icon-fa-[IDENTIFIER]' in the menu item
	 * classes, return the Font Awesome class.
	 *
	 * @param WP_Post $item the menu item.
	 *
	 * @return string the Font Awesome class
	 */
	private function get_icon_markup( WP_Post $item ) {
		foreach ( $item->classes as $class_name ) {
			if ( substr( $class_name, 0, 8 ) === 'icon-fa-' ) {
				$fa_class = 'fa-' . substr( $class_name, 8 );
				return '<i class="fa fa-fw ' . $fa_class . '"></i>';
			}
		}
		return '';
	}
}
