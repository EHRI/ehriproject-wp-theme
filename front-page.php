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
	<section class="hero">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'loop-templates/content', 'hero' ); ?>
		<?php endwhile; ?>
	</section>
	<?php endif; ?>
	<section class="page-content" role="main">
		<?php
		$args      = ehriproject_homepage_teaser_args( 3 );
		$the_query = new WP_Query( $args );
		?>
		<?php if ( $the_query->have_posts() ) : ?>
			<div class="front-page">
				<h2><?php esc_html_e( 'Latest News', 'ehriproject' ); ?></h2>
				<div class="front-page-teasers">
					<?php while ( $the_query->have_posts() ) : ?>
						<?php $the_query->the_post(); ?>
						<?php get_template_part( 'loop-templates/content-front', get_post_format() ); ?>
					<?php endwhile; ?>
				</div>
				<div class="section-footer">
					<a class="button-primary" href="/latestnews"><?php esc_html_e( 'More News', 'ehriproject' ); ?></a>
				</div>
			</div>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
