<?php
/**
 * The main template file.
 */

?>

<?php get_header(); ?>

    <div id="main">
        <div id="main-inner">
            <div id="content" class="column" role="main">
                <div id="content-inner">
                    <?php
                    if (false === ( $the_query = get_transient( 'ehri_homepage_posts' ) )) {
                        // First query - get posts matching meta conditions
                        $meta_args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'post_type' => array('post', 'page'),
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'homepage_order',
                                    'compare' => 'EXISTS'
                                )
                            )
                        );

                        // Second query - get posts matching taxonomy conditions
                        $tax_args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'post_type' => array('post', 'page'),
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'news'
                                )
                            )
                        );

                        // Run both queries
                        $meta_query = new WP_Query($meta_args);
                        $tax_query = new WP_Query($tax_args);

                        // Merge the post IDs and remove duplicates
                        $meta_posts = wp_list_pluck($meta_query->posts, 'ID');
                        $tax_posts = wp_list_pluck($tax_query->posts, 'ID');
                        $all_post_ids = array_unique(array_merge($meta_posts, $tax_posts));

                        // Final query to get all posts in the right order
                        $final_args = array(
                            'post_status' => 'publish',
                            'post__in' => $all_post_ids,
                            'orderby' => 'homepage_order post_date', // Or whatever ordering you want
                            'order' => 'DESC',
                            'posts_per_page' => 6,
                        );


                        $the_query = new WP_Query($final_args);
                        set_transient('ehri_homepage_posts', $the_query, 24 * HOUR_IN_SECONDS);
//                        delete_transient('ehri_homepage_posts');
                    }
                    ?>
                    <a id="main-content"></a>
                    <div class="ds-1col node node-homepage view-mode-full clearfix">
                        <div class="field field-name-body"></div>
                    </div>
                    <div id="block-views-homepage-teasers-block-1" class="block block-views last even">
                        <div class="view view-homepage-teasers">
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <?php get_template_part( 'loop-templates/content-front', get_post_format() ); ?>
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