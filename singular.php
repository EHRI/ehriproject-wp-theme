<?php
/**
 * The template for displaying all single posts.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content">
	<?php if ( have_posts() ) : ?>
		<section <?php post_class( 'page-content' ); ?> id="post-<?php the_ID(); ?>">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'single' ); ?>
			<?php endwhile; ?>
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
