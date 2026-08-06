<?php
/**
 * Template Name: Full Width Page
 * Template Post Type: page
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
		<section <?php post_class( array( 'page-content', 'full-width' ) ); ?> id="post-<?php the_ID(); ?>">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
