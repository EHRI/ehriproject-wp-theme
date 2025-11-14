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

<div id="main">
	<div id="main-inner">
		<?php if ( have_posts() ) : ?>
			<div id="content" class="column" role="main">
				<div id="content-inner">
					<a id="main-content"></a>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'single' ); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
					<?php
					$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args         = array(
						'category_name' => 'news',
						'paged'         => $current_page,
						'orderby'       => 'date',
						'order'         => 'DESC',
					);
					$news_query   = new WP_Query( $args );
					?>

					<?php if ( $news_query->have_posts() ) : ?>
						<?php while ( $news_query->have_posts() ) : ?>
							<?php $news_query->the_post(); ?>
							<?php get_template_part( 'loop-templates/content', 'news' ); ?>
						<?php endwhile; ?>

						<!-- The pagination component -->
						<?php ehriproject_pagination( $news_query ); ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
