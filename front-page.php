<?php
/**
 * The main template file.
 *
 * @package ehriproject-wp-theme
 */

?>

<?php get_header(); ?>

<div id="main">
	<div id="content" class="column" role="main">
			<?php
			$args      = ehriproject_homepage_teaser_args();
			$the_query = new WP_Query( $args );
			?>
			<a id="main-content"></a>
			<div class="front-page">
				<div class="front-page-teasers">
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : ?>
							<?php $the_query->the_post(); ?>
							<?php get_template_part( 'loop-templates/content-front', get_post_format() ); ?>
							<?php endwhile; ?>
						<?php endif; ?>
				</div>
			</div>
		</div>
</div>

<?php get_footer(); ?>
