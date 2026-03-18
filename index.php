<?php
/**
 * The main template file.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php get_header(); ?>

<main id="content">
	<section class="page-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
