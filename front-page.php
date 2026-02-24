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
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<section class="hero">
				<header class="hero-header">
					<div class="hero-image" id="parallax-back"></div>
					<div class="hero-parallax-overlay" id="parallax-mid"></div>
					<div class="hero-parallax-overlay" id="parallax-front"></div>
					<h1 class="hero-title">
						<?php the_title(); ?>
					</h1>
					<h2 class="hero-tagline">
						<?php the_excerpt(); ?>
					</h2>
				</header>
			</section>

			<?php get_template_part( 'loop-templates/content', 'hero' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
