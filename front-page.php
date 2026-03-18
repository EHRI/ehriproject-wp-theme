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
		<?php if ( have_posts() ) : ?>
			<section <?php post_class( array( 'page-content', 'front-page' ) ); ?> id="post-<?php the_ID(); ?>">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'front' ); ?>
				<?php endwhile; ?>
			</section>
		<?php endif; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
