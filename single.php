<?php
/**
 * The template for displaying all single posts.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div id="main">
	<?php if ( have_posts() ) : ?>
		<div id="content" class="column" role="main">
			<div id="content-inner">
				<a id="main-content"></a>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'single' ); ?>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
