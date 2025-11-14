<?php
/**
 * The template for latest news items.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div id="main">
	<div id="main-inner">
		<?php if ( have_posts() ) : ?>
			<div id="content" class="column" role="main">
				<div id="content-inner">
					<a id="main-content"></a>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'single' ); ?>
					<?php endwhile; ?>
					<?php
						$args         = array(
							'tag'      => 'fellows-list-2013',
							'orderby'  => 'date',
							'order'    => 'ASC',
							'nopaging' => true,
						);
						$people_query = new WP_Query( $args );
						?>

					<?php if ( $people_query->have_posts() ) : ?>
						<?php while ( $people_query->have_posts() ) : ?>
							<?php $people_query->the_post(); ?>
							<?php get_template_part( 'loop-templates/content', 'fellowship' ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php get_sidebar(); ?>
	</div>
</div>


<?php
get_footer(); ?>
