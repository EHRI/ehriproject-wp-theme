<?php
/**
 * The main template file.
 *
 * @package ehriproject-wp-theme
 */

?>

<?php get_header(); ?>

<main id="content">
	<?php $show_on_front = get_option( 'show_on_front' ); ?>
	<?php if ( 'page' === $show_on_front ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'loop-templates/content', 'hero' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
