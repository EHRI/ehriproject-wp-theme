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
	<section class="page-content resource-teaser" role="main">
		<a href="https://portal.ehri-project.eu" class="resource-teaser-media">
			<img src="<?php echo esc_url( get_theme_file_uri( 'images/portal-teaser.png' ) ); ?>" alt="EHRI
			Portal Teaser Image">
		</a>
		<header class="resource-teaser-header">
			<a href="https://portal.ehri-project.eu/">
				<h2 class="resource-teaser-title">The EHRI Portal</h2>
			</a>
		</header>
		<p class="resource-teaser-description">
			The EHRI portal offers access to information on Holocaust-related archival material held in institutions across Europe and beyond.
		</p>
		<a class="button-primary resource-teaser-link" href="https://portal.ehri-project.eu">
			Explore the EHRI Portal
		</a>
	</section>
	<section class="page-content latest-news" role="main">
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
	<section class="page-content resource-teaser resource-teaser-flipped resource-teaser-thirds" role="main">
		<div class="resource-teaser-media">
			<iframe src="https://www.buzzsprout.com/2057183/11392057-trailer-ehri-podcast-for-the-living-and-the-dead-traces-of-the-holocaust-season-1?client_source=small_player&amp;iframe=true" style="border:none;max-width:100%;width:100%;height:200px" frameborder="0" scrolling="yes" allowfullscreen=""></iframe>
		</div>
		<header class="resource-teaser-header">
			<h2 class="resource-teaser-title">EHRI Podcast</h2>
		</header>
		<p class="resource-teaser-description">
			The EHRI portal offers access to information on Holocaust-related archival material held in institutions across Europe and beyond.
		</p>
		<a class="button-primary resource-teaser-link" href="/ehri-podcast-for-the-living-and-the-dead/">
			Browse episodes
		</a>
	</section>
</main>

<?php get_footer(); ?>
