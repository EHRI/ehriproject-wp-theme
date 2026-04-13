<?php
/**
 * News post partial template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
			<div class="post-thumbnail" style="--post-thumbnail: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>');">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</div>
		</a>
	<?php endif; ?>
	<header class="post-header">
		<h2>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</header>
	<div class="post-date">
			<span class="date-display-single">
				<?php echo get_the_date( 'l, F jS, Y' ); ?>
			</span>
	</div>

	<div class="post-excerpt">
		<?php echo get_the_excerpt(); ?>
	</div>
	<div class="post-read-more">
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
			<?php esc_html_e( 'Read more', 'ehri' ); ?>
		</a>
	</div>
</div>
