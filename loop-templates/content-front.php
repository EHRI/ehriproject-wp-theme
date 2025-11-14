<?php
/**
 * Front page template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div <?php post_class( 'views-row' ); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="views-field views-field-field-photo">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php echo ehriproject_teaser_element( get_the_title() ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div>
		<!-- render the title as a link -->
		<h3>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
	</div>
</div><!-- #post-## -->
