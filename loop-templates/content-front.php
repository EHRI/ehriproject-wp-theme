<?php
/**
 * Single post partial template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="views-row" <?php
post_class(); ?> id="post-<?php
the_ID(); ?>">
	<?php
	if ( has_post_thumbnail() ): ?>
		<div class="views-field views-field-field-photo">
			<a href="<?php
			echo esc_url( get_permalink() ); ?>" title="<?php
			echo get_the_title(); ?>">
				<?php
				echo ehriproject_teaser_element( $alt_text = get_the_title() ); ?>
			</a>
		</div>
	<?php
	endif; ?>
	<div>
		<!-- render the title as a link -->
		<h3>
			<a href="<?php
			echo esc_url( get_permalink() ); ?>" title="<?php
			echo get_the_title(); ?>">
				<?php
				the_title(); ?>
			</a>
		</h3>
	</div>
</div><!-- #post-## -->
