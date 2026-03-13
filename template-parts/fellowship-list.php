<?php
/**
 * Reusable fellowship list template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Determine the tag based on the page slug.
$page_slug = get_post_field( 'post_name', get_the_ID() );
$tag_map   = array(
	'ehri-fellows-2012' => 'fellows-list',
	'ehri-fellows-2013' => 'fellows-list-2013',
	'ehri-fellows-2014' => 'fellow-list-2014',
);

$fellowship_tag = isset( $tag_map[ $page_slug ] ) ? $tag_map[ $page_slug ] : 'fellows-list';

$args         = array(
	'tag'      => $fellowship_tag,
	'orderby'  => 'date',
	'order'    => 'ASC',
	'nopaging' => true,
);
$people_query = new WP_Query( $args );

if ( $people_query->have_posts() ) :
	?>
	<div class="post-list">
		<?php
		while ( $people_query->have_posts() ) :
			$people_query->the_post();
			get_template_part( 'loop-templates/content', 'fellowship' );
		endwhile;
		?>
	</div>
	<?php
	wp_reset_postdata();
endif;
