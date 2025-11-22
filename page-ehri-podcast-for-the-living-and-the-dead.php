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
	<div class="page-content" role="main">
		<?php if ( have_posts() ) : ?>
			<a id="main-content"></a>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'single' ); ?>
			<?php endwhile; ?>

			<!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
			<?php
			$args          = array(
				'orderby'   => 'date',
				'order'     => 'DESC',
				'publish'   => true,
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required for showing only podcast episodes.
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => 'podcast-episode',
					),
				),
				'nopaging'  => true,
			);
			$podcast_query = new WP_Query( $args );
			?>

			<?php if ( $podcast_query->have_posts() ) : ?>
				<div class="podcast-episode-list">
					<?php while ( $podcast_query->have_posts() ) : ?>
						<?php $podcast_query->the_post(); ?>
						<div class="podcast-episode" id="podcast-episode-<?php the_ID(); ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo get_the_post_thumbnail_url( null, 'medium' ); ?>" alt="<?php
								the_title(); ?>">
							</a>

							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php echo preg_replace( '/Podcast Episode\s*\|?\s*/', '', get_the_title() ); ?>
								</a>
								<?php echo wp_strip_all_tags( get_the_excerpt() ); ?>
							</h3>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>
