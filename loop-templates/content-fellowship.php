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


<div <?php post_class( 'fellowship' ); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'medium' ); ?>
		</div>
	<?php endif; ?>
	<div class="post-content">
		<header class="post-header">
			<h2 class="post-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</header>

		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<div class="post-read-more">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php echo __( 'Read more', 'ehri' ); ?>
			</a>
		</div>
	</div>
</div>
