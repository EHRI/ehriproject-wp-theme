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

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="post-thumbnail">
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
			<?php the_post_thumbnail( null, 'medium' ); ?>
		</a>
	</div>
	<div class="post-content">
		<header class="post-header">
			<h3>
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
		</header>
	</div>
</div><!-- #post-## -->
