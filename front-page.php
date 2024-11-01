<?php
/**
 * The main template file.
 */

?>

<?php get_header(); ?>

<main id="content">

    <section class="home services">
        <div class="hero">
            <!-- Fetch a random gallery_item and use it as the header image -->
		    <?php

		    if (false === ($gallery_items = get_transient('ehri_gallery_items'))) {
			    $args = array(
				    'post_type' => 'gallery_item',
				    'orderby' => 'rand'
			    );
			    $gallery_items = new WP_Query($args);
			    set_transient('ehri_gallery_items', $gallery_items, 24 * HOUR_IN_SECONDS);
		    }
		    if ($gallery_items->have_posts()) {
			    shuffle($gallery_items->posts);
			    while ($gallery_items->have_posts()) {
				    $gallery_items->the_post();
//				echo ehriproject_header_element(get_the_title());
				    break;
			    }
		    } ?>
        </div>

        <?php
        if (false === ($the_query = get_transient('ehri_homepage_posts'))) {
            $args = array(
                'post_type' => array('post', 'page'),
                'posts_per_page' => 6,
                'orderby' => array('meta_value_num' => 'ASC', 'date' => 'DESC'),
                'meta_key' => 'homepage_order',
            );
            $the_query = new WP_Query($args);
            set_transient('ehri_homepage_posts', $the_query, 24 * HOUR_IN_SECONDS);
        }
        ?>
        <div class="resource-cards">
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('loop-templates/content-front', get_post_format()); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php get_sidebar(); ?>
</main>


<?php get_footer(); ?>