<?php
/**
 * The template for latest news items.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

wp_enqueue_script("leaflet-js", "js");

get_header();
?>

<main id="content">
	<?php if ( have_posts() ) : ?>
		<section class="page-content" role="main">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<div class="map-container">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
