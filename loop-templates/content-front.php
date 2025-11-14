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

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
				<?php echo ehriproject_teaser_element( get_the_title() ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="post-content">
		<header class="post-header">
			<h3>
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
		</header>
		<div class="post-body">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div><!-- #post-## -->
