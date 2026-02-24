<?php
/**
 * EHRI custom widgets.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'ehriproject_teaser_element' ) ) {
	/**
	 * Generate a <picture> element for the teaser image.
	 *
	 * @param string $alt_text Alt text for the teaser image.
	 *
	 * @return string HTML for a <picture> element containing the teaser image sizes.
	 */
	function ehriproject_teaser_element( $alt_text = '' ) {
		// Return a <picture> element containing the teaser image sizes. These are hard-coded now to
		// reflect the legacy site but this should be updated when the theme is refreshed.
		$html  = '<picture>';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_desktop_1x' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_desktop_2x' ) ) . ' 2x" media="(min-width: 1200px)">';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_tablet_1x' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_tablet_2x' ) ) . ' 2x" media="(min-width: 960px)">';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_mobile_1x' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'teaser_mobile_2x' ) ) . ' 2x" media="(min-width: 0px)">';
		$html .= '<img src="' . esc_url( get_the_post_thumbnail_url( null, 'teaser_mobile_1x' ) ) . '" alt="' .
				esc_attr( $alt_text ) . '">';
		$html .= '</picture>';

		return $html;
	}
}

if ( ! function_exists( 'ehriproject_header_element' ) ) {
	/**
	 * Return a <picture> element containing the header image sizes. These are hard-coded now to
	 * reflect the legacy site but this should be updated when the theme is refreshed.
	 *
	 * @param string $alt_text Alt text for the header image.
	 *
	 * @return string
	 */
	function ehriproject_header_element( $alt_text = '' ) {
		$html  = '<picture>';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'large' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'full' ) ) . ' 2x" media="(min-width: 1200px)">';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'medium' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'large' ) ) . ' 2x" media="(min-width: 960px)">';
		$html .= '<source srcset="' .
				esc_url( get_the_post_thumbnail_url( null, 'medium' ) ) . ' 1x, ' .
				esc_url( get_the_post_thumbnail_url( null, 'large' ) ) . ' 2x" media="(min-width: 0px)">';
		$html .= '<img src="' . esc_url( get_the_post_thumbnail_url( null, 'full' ) ) . '" alt="' .
				esc_attr( $alt_text ) . '">';
		$html .= '</picture>';

		return $html;
	}
}

if ( ! function_exists( 'ehriproject_add_promote_to_home_meta_box' ) ) {
	/**
	 * Add a meta box to posts and pages for promoting to homepage.
	 *
	 * @return void
	 */
	function ehriproject_add_promote_to_home_meta_box() {
		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'promote_to_home',                  // Unique ID.
				'Homepage Promotion',               // Box title.
				'ehriproject_promote_to_home_html', // Content callback, must be of type callable.
				$screen,                            // Post type.
				'side'                              // Position.
			);
		}
	}
}
add_action( 'add_meta_boxes', 'ehriproject_add_promote_to_home_meta_box' );

// Meta box HTML.
if ( ! function_exists( 'ehriproject_promote_to_home_html' ) ) {
	/**
	 * Render the HTML for the promote to homepage meta box.
	 *
	 * @param WP_Post $post The post object.
	 *
	 * @return void
	 */
	function ehriproject_promote_to_home_html( $post ) {
		// Add a nonce field for security.
		wp_nonce_field( 'ehriproject_promote_to_home_nonce', 'promote_to_home_nonce' );
		$value = get_post_meta( $post->ID, '_promote_to_home', true );
		?>
		<label for="promote_to_home">
			<input type="checkbox" id="promote_to_home" name="promote_to_home" <?php checked( $value, 'yes' ); ?>/>
			Promote to homepage
		</label>
		<?php
	}
}

// Save meta box data.
if ( ! function_exists( 'ehriproject_save_promote_to_home_meta' ) ) {
	/**
	 * Save the promote to homepage meta box data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function ehriproject_save_promote_to_home_meta( $post_id ) {
		// Check if nonce field exists before validating.
		if ( ! isset( $_POST['promote_to_home_nonce'] ) ) {
			return $post_id; // Meta box not present, skip validation.
		}

		// Now validate the nonce.
		$nonce = sanitize_text_field( wp_unslash( $_POST['promote_to_home_nonce'] ) );
		if ( ! wp_verify_nonce( $nonce, 'ehriproject_promote_to_home_nonce' ) ) {
			return $post_id; // Invalid nonce.
		}

		// Check user capabilities.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( isset( $_POST['promote_to_home'] ) ) {
			update_post_meta(
				$post_id,
				'_promote_to_home',
				'yes'
			);
		} else {
			delete_post_meta( $post_id, '_promote_to_home' );
		}
	}
}
add_action( 'save_post', 'ehriproject_save_promote_to_home_meta' );

if ( ! function_exists( 'ehriproject_add_homepage_order_meta_box' ) ) {
	/**
	 * Add a meta box to posts and pages for setting homepage order.
	 *
	 * @return void
	 */
	function ehriproject_add_homepage_order_meta_box() {
		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'homepage_order',                  // Unique ID.
				'Homepage Priority',               // Box title.
				'ehriproject_homepage_order_html', // Content callback, must be of type callable.
				$screen,                           // Post type.
				'side'                             // Position.
			);
		}
	}
}
add_action( 'add_meta_boxes', 'ehriproject_add_homepage_order_meta_box' );

// Meta box HTML.
if ( ! function_exists( 'ehriproject_homepage_order_html' ) ) {
	/**
	 * Render the HTML for the homepage order meta box.
	 *
	 * @param WP_Post $post The post object.
	 */
	function ehriproject_homepage_order_html( $post ) {
		$value = get_post_meta( $post->ID, '_homepage_order', true );
		?>
		<?php wp_nonce_field( 'ehriproject_homepage_order_nonce', 'homepage_order_nonce' ); ?>
		<label for="homepage_order">
			<input type="number" id="homepage_order" name="homepage_order" min="1" max="999" value="<?php echo esc_attr( $value ); ?>"/>
		</label>
		<?php
	}
}

if ( ! function_exists( 'ehriproject_save_homepage_order_meta' ) ) {
	/**
	 * Save the homepage order meta box data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	function ehriproject_save_homepage_order_meta( $post_id ) {
		// Check if nonce field exists before validating.
		if ( ! isset( $_POST['homepage_order_nonce'] ) ) {
			return $post_id; // Meta box not present, skip validation.
		}

		// Now validate the nonce.
		$nonce = sanitize_text_field( wp_unslash( $_POST['homepage_order_nonce'] ) );
		if ( ! wp_verify_nonce( $nonce, 'ehriproject_homepage_order_nonce' ) ) {
			return $post_id; // Invalid nonce.
		}

		// Check user capabilities.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( array_key_exists( 'homepage_order', $_POST ) && '' !== $_POST['homepage_order'] ) {
			update_post_meta(
				$post_id,
				'_homepage_order',
				intval( wp_unslash( $_POST['homepage_order'] ) )
			);
		} else {
			delete_post_meta( $post_id, '_homepage_order' );
		}
	}
}

add_action( 'save_post', 'ehriproject_save_homepage_order_meta' );

