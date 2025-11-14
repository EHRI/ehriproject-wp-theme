<?php
/**
 * The search results template file.
 *
 * @package ehriproject-wp-theme
 */

?>

<?php get_header(); ?>

<div id="main">
	<div id="main-inner">
		<div id="content" class="column" role="main">
			<div id="content-inner">
				<a id="main-content"></a>
				<?php $query = get_search_query(); ?>
				<?php if ( have_posts() ) : ?>
					<h1 class="page__title title" id="page-title">Search Results</h1>
					<?php $q = trim( $query ); ?>
					<?php if ( $q ) : ?>
						<h2 class="text-muted">
							<?php echo '"' . esc_html( $q ) . '"'; ?>
						</h2>
					<?php endif; ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'news' ); ?>
					<?php endwhile; ?>

					<!-- The pagination component -->
<!--					--><?php //ehriproject_pagination( $query ); ?>
				<?php else : ?>
					<h4><?php echo esc_html( sprintf( 'No results found for "%s"', $query ) ); ?> </h4>
				<?php endif; ?>
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
