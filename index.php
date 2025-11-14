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

	<div id="main">
		<div id="main-inner">
			<div id="content" class="column" role="main">
				<div id="content-inner">
					<a id="main-content"></a>
					<div class="ds-1col node node-homepage view-mode-full clearfix">
						<div class="field field-name-body"></div>
					</div>
					<div id="block-views-homepage-teasers-block-1" class="block block-views last even">
						<div class="view view-homepage-teasers">
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : ?>
									<?php the_post(); ?>
									<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>

<?php get_footer(); ?>
