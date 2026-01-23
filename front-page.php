<?php
/**
 * The main template file.
 *
 * @package ehriproject-wp-theme
 */

?>

<?php get_header(); ?>

<script>
	window.addEventListener('load', function() {
		const layer1 = document.getElementById('parallax-back');
		const layer2 = document.getElementById('parallax-mid');
		const layer3 = document.getElementById('parallax-front');

		window.addEventListener('scroll', () => {
			const scrolled = window.pageYOffset;

			// Different speeds for each layer
			// Layer 1 (background) moves slowest
			layer1.style.transform = `translateY(${scrolled * 0.1}px)`;

			// Layer 2 (mid-ground) moves at medium speed
			layer2.style.transform = `translateY(${scrolled * 0.2}px)`;

			// Layer 3 (foreground) moves fastest
			layer3.style.transform = `translateY(${scrolled * 0.3}px)`;
		});
	});
</script>

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
