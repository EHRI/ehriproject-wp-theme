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
	<div class="page-content">
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'news' ); ?>
				<?php endwhile; ?>
			</div>
			<?php ehriproject_pagination( $wp_query ); ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
