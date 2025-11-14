<?php
/**
 * Partial template for fellowships.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


<div <?php post_class( array( 'clearfix', 'views-row' ) ); ?> id="post-<?php the_ID(); ?>">
	<div class="ds-1col node node-news view-mode-full">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="field field-name-field-photo">
				<?php the_post_thumbnail( 'medium' ); ?>
			</div>
		<?php endif; ?>
		<div class="field field-name-field-title">
			<h2>
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</div>

		<div class="field field-name-field-body">
			<?php the_excerpt(); ?>
		</div>
		<div class="field field-name-node-link">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php echo __( 'Read more', 'ehri' ); ?>
			</a>
		</div>
	</div>
</div>
