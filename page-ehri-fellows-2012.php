<?php
/**
 * The template for 2012 fellows.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content">
	<section class="page-content">
		<a id="main-content"></a>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'loop-templates/content', 'single' ); ?>
		<?php endwhile; ?>
		<?php get_template_part( 'template-parts/fellowship', 'list' ); ?>
	</section>
</main>


<?php
get_footer(); ?>
