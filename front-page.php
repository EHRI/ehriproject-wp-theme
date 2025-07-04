<?php
/**
 * The main template file.
 *
 * @package ehriproject-wp-theme
 */

?>

<?php
get_header();
?>

	<div id="main">
		<div id="main-inner">
			<div id="content" class="column" role="main">
				<div id="content-inner">
					<?php
					$args      = ehriproject_homepage_teaser_args( 6 );
					$the_query = new WP_Query( $args );

					?>
					<a id="main-content"></a>
					<div class="ds-1col node node-homepage view-mode-full clearfix">
						<div class="field field-name-body"></div>
					</div>
					<div id="block-views-homepage-teasers-block-1" class="block block-views last even">
						<div class="view view-homepage-teasers">
							<?php
							if ( $the_query->have_posts() ) :
								?>
								<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									?>
									<?php
									get_template_part( 'loop-templates/content-front', get_post_format() );
									?>
									<?php
								endwhile;
								?>
								<?php
							endif;
							?>
						</div>
					</div>
				</div>
			</div>

			<?php
			get_sidebar();
			?>

		</div>
	</div>

<?php
get_footer(); ?>
