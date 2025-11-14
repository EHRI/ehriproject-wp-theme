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

<?php if ( $post_status === 'private' ) : ?>
	<div class="alert alert-warning">
		<?php esc_html_e( 'This post is only visible to admins and editors.', 'ehriproject' ); ?>
	</div>
<?php endif; ?>


<h1 class="page__title title" id="page-title"><?php the_title(); ?></h1>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="ds-1col node node-news view-mode-full">
		<div class="field field-name-field-photo">
			<?php the_post_thumbnail( 'medium' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php if ( has_category( 'news' ) ) : ?>
	<div class="field field-name-field-datum">
		<span class="date-display-single">
			<?php echo get_the_date( 'l, F jS, Y' ); ?>
		</span>
	</div>
<?php endif; ?>

<div class="field field-name-body">
	<?php the_content(); ?>
</div>
