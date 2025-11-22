<?php
/**
 * Single post partial template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$post_status = get_post_status();
?>

<?php if ( 'private' === $post_status ) : ?>
	<div class="alert alert-warning">
		<?php esc_html_e( 'This post is only visible to admins and editors.', 'ehriproject' ); ?>
	</div>
<?php endif; ?>

<header class="post-header">
	<h1 class="post-title" id="post-title"><?php the_title(); ?></h1>
</header>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-featured-image">
		<?php the_post_thumbnail( 'medium' ); ?>
	</div>
<?php endif; ?>

<div class="post-body">
	<?php if ( has_category( 'news' ) ) : ?>
		<div class="post-date">
		<span class="date-display-single">
			<?php echo get_the_date( 'l, F jS, Y' ); ?>
		</span>
		</div>
	<?php endif; ?>

	<?php the_content(); ?>
</div>
