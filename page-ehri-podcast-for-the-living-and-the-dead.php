<?php
/**
 * The template for the EHRI podcast page.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>


<main id="content">
	<section <?php post_class( array( 'page-content', 'podcast-season', 'full-width' ) ); ?>>
		<?php if ( have_posts() ) : ?>
			<a id="main-content"></a>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
			<?php
			$args          = array(
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_status' => 'publish',
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required for showing only podcast episodes.
				'tax_query'   => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => 'podcast-episode',
					),
				),
				'nopaging'    => true,
			);
			$podcast_query = new WP_Query( $args );
			?>

			<?php if ( $podcast_query->have_posts() ) : ?>
				<div class="podcast-episode-list post-list">
					<?php while ( $podcast_query->have_posts() ) : ?>
						<?php $podcast_query->the_post(); ?>
						<div <?php post_class( 'podcast-episode' ); ?> id="podcast-episode-<?php the_ID(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>">
									<div class="post-thumbnail" style="--post-thumbnail: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>');">
										<?php the_post_thumbnail( 'medium' ); ?>
									</div>
								</a>
							<?php endif; ?>

							<header class="post-header">
								<h2 class="post-title">
									<a href="<?php the_permalink(); ?>">
										<?php echo esc_html( preg_replace( '/Podcast Episode\s*\|?\s*/', '', get_the_title() ) ); ?>
									</a>
									<?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>
								</h2>
							</header>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
