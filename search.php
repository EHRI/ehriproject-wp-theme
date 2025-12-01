<?php
/**
 * The search results template file.
 *
 * @package ehriproject-wp-theme
 */

// Get the search query for pagination.
global $wp_query;

?>

<?php get_header(); ?>

<main id="content">
	<?php $query = get_search_query(); ?>
	<?php $q = trim( $query ); ?>
	<section class="hero">
		<div class="hero-title">
			<header class="hero-header">
				<h1><?php esc_html_e( 'Search the EHRI website', 'ehriproject' ); ?></h1>

				<form method="get">
					<div class="hero-search-box">
						<label class="sr-only" for="hero-search-box">Search</label>
						<input name="s" id="hero-search-box" class="hero-search-box-input" type="text"
							placeholder="<?php esc_attr_e( 'What are you looking for?', 'ehriproject' ); ?>"
							value="<?php echo esc_attr( $q ); ?>">
						<button type="submit" class="hero-search-box-button button-primary">
							<?php esc_html_e( 'Search', 'ehriproject' ); ?>
						</button>
					</div>
				</form>
			</header>
		</div>
	</section>
	<section class="page-content" role="main">
		<?php if ( have_posts() ) : ?>
			<?php if ( $q ) : ?>
				<section class="breadcrumbs">
					<div class="text-muted">
						<?php echo '"' . esc_html( $q ) . '"'; ?>
					</div>
				</section>
			<?php endif; ?>

			<div class="post-list">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'news' ); ?>
				<?php endwhile; ?>
			</div>

			<!-- The pagination component -->
			<?php ehriproject_pagination( $wp_query ); ?>
		<?php else : ?>
			<h4><?php echo esc_html( sprintf( 'No results found for "%s"', $query ) ); ?> </h4>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
