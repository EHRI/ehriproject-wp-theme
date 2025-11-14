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

<div <?php post_class( 'views-row' ); ?> id="post-<?php the_ID(); ?>">
	<div class="views-field views-field-field-photo">
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
			<?php the_post_thumbnail( null, 'medium' ); ?>
		</a>
	</div>
	<div>
		<!-- render the title as a link -->
		<h3>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
	</div>
</div><!-- #post-## -->
