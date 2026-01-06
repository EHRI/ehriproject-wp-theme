<?php
/**
 * The template for 2016 fellows.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content">
	<section class="page-content" role="main">
		<a id="#main-content"></a>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'loop-templates/content', 'single' ); ?>
		<?php endwhile; ?>

		<div class="view-filters">
			<?php
			$year_opts        = get_terms( 'fellowship_year', array( 'hide_empty' => true ) );
			$institution_opts = get_terms( 'fellowship_institution', array( 'hide_empty' => true ) );
			$current_page     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$fellowship_year  = get_query_var( 'fellowship-year' );
			$institution      = get_query_var( 'fellowship-institution' );

			$tax_queries = array();
			if ( $fellowship_year ) {
				$tax_queries[] = array(
					'taxonomy' => 'fellowship_year',
					'field'    => 'slug',
					'terms'    => $fellowship_year,
				);
			}
			if ( $institution ) {
				$tax_queries[] = array(
					'taxonomy' => 'fellowship_institution',
					'field'    => 'slug',
					'terms'    => $institution,
				);
			}

			$args      = array(
				'tag'            => 'fellows-list,fellows-list-2013,fellow-list-2014,fellow-list-2016',
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required for filtering.
				'tax_query'      => $tax_queries,
				'paged'          => $current_page,
				'posts_per_page' => 20,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			$the_query = new WP_Query( $args );

			?>

			<form method="GET" accept-charset="UTF-8">
				<div class="page-section">
					<div id="edit-field-host-institution-value-wrapper"
						class="views-exposed-widget views-widget-filter-field_host_institution_value">
						<label for="edit-field-host-institution-value">Host institution</label>
						<div class="views-widget">
							<div class="form-item form-type-select form-item-field-host-institution-value">
								<select id="edit-field-host-institution-value" name="fellowship-institution"
										class="form-select">
									<option value="" selected="selected">- Any -</option>
									<?php foreach ( $institution_opts as $institution_term ) : ?>
										<?php if ( $institution_term->slug === $institution ) : ?>
											<option value="<?php echo $institution_term->slug; ?>"
													selected="selected">
												<?php echo $institution_term->name; ?>
											</option>
										<?php else : ?>
											<option value="<?php echo $institution_term->slug; ?>">
												<?php echo $institution_term->name; ?>
											</option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div id="edit-field-year-of-fellowship-value-wrapper"
						class="views-exposed-widget views-widget-filter-field_year_of_fellowship_value">
						<label for="edit-field-year-of-fellowship-value">Year of Fellowship</label>
						<div class="views-widget">
							<div class="form-item form-type-select form-item-field-year-of-fellowship-value">
								<select id="edit-field-year-of-fellowship-value" name="fellowship-year"
										class="form-select">
									<option value="" selected="selected">- Any -</option>
									<?php foreach ( $year_opts as $year_term ) : ?>
										<?php if ( $year_term->slug === $year ) : ?>
											<option value="<?php echo $year_term->slug; ?>"
													selected="selected"><?php echo $year_term->name; ?></option>
										<?php else : ?>
											<option value="<?php echo $year_term->slug; ?>">
												<?php echo $year_term->name; ?>
											</option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="views-exposed-widget views-submit-button">
						<input type="submit" id="edit-submit-clone-of-ehri-fellows-2016" value="Apply"
							class="form-submit">
					</div>
				</div>

				<?php if ( $the_query->have_posts() ) : ?>
					<div class="post-list">
						<?php while ( $the_query->have_posts() ) : ?>
							<?php $the_query->the_post(); ?>
							<?php get_template_part( 'loop-templates/content', 'fellowship' ); ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<!-- The pagination component -->
				<?php ehriproject_pagination( $the_query ); ?>
			</form>
		</div>
	</section>
</main>


<?php get_footer(); ?>
