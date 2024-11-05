<?php
/**
 * The template for latest news items.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content">
    <section class="page-content" role="main">
        <a id="#main-content"></a>
        <h1 class="page__title title" id="page-title"><?php echo __( 'Latest News' ); ?></h1>
        <!-- Fetch all posts with the 'news' category and list them in reverse chronological order with pagination -->
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args  = array(
			'category_name' => 'news',
			'paged'         => $paged,
			'orderby'       => 'date',
			'order'         => 'DESC',
		);
		query_posts( $args );
		?>

		<?php if ( have_posts() ) : ?>
        <div class="page-summaries">
	        <?php while ( have_posts() ) : the_post(); ?>
		        <?php get_template_part( 'loop-templates/content', 'news' ); ?>
	        <?php endwhile; ?>
        </div>
		<?php endif; ?>

        <!-- The pagination component -->
		<?php ehri_pagination(); ?>
    </section>
	<?php get_sidebar(); ?>

</main>


<?php get_footer(); ?>
