<?php
/**
 * The template for latest news items.
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
		<section class="page-content" role="main">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'single' ); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
			<?php
			$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args         = array(
				'category_name'  => 'news',
				'paged'          => $current_page,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => 12,
			);
			$news_query   = new WP_Query( $args );
			?>

			<?php if ( $news_query->have_posts() ) : ?>
				<div class="news post-list">
					<?php while ( $news_query->have_posts() ) : ?>
						<?php $news_query->the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'news' ); ?>
					<?php endwhile; ?>

				</div>

				<!-- The pagination component -->
				<?php ehriproject_pagination( $news_query ); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
