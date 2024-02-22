<?php
/**
 * The sidebar containing the main widget area.
 */
?>

<aside class="sidebars">
    <section class="region region-sidebar-second column sidebar">
        <div id="block-block-21" class="block block-block first odd">


            <div class="socmed">follow us on: <br/>
                <a href="https://twitter.com/EHRIproject" target="_blank"><img alt="Twitter"
                                                                               src="<?php echo get_theme_file_uri('images/twitter.png'); ?>"></a>

                <a href="https://facebook.com/EHRIproject" target="_blank"><img alt="Facebook"
                                                                                src="<?php echo get_theme_file_uri('images/facebook.png'); ?>"/></a>

                <a href="https://www.linkedin.com/company/ehri-european-holocaust-research-infrastructure/"
                   target="_blank"><img alt="LinkedIn" src="<?php echo get_theme_file_uri('images/linkedin2.png'); ?>"/></a>
            </div>
        </div>
        <div id="block-block-27" class="block block-block even">


            <div class="resources">
                <h2>Resources</h2>
                <!-- Render the sidebar menu resources menu -->
                <?php wp_nav_menu(array(
                    'menu' => 'resources-menu',
                    'theme_location' => 'primary',
                    'fallback_cb' => false
                )); ?>
            </div>

        </div>
        <div id="block-views-latestnews-block-2" class="block block-views news last odd">

            <h2 class="block__title block-title"><a href="/latestnews" class="block-title-link"></a></h2>

            <div class="view view-latestnews view-id-latestnews view-display-id-block_2 view-dom-id-cd819287d9ba73b1478531a088de54d4">

                <!-- Fetch a random gallery_item and use it as the header image -->
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'category_name' => 'News',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'newsletter_category',
                            'field' => 'slug',
                            'terms' => array('Online'),
                            'operator' => 'OR'
                        )
                    ),
                );
                $query = new WP_Query($args);
                ?>

                <div class="view-content">
                    <?php if ($query->have_posts()) : ?>
                        <?php $num = 1; ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="views-row views-row-<?php echo $num; ?> views-row-odd views-row-first">
                                <div>
                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink()); ?>"
                                           title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <?php $num++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="more-link">
                    <a href="/latestnews">
                        More news... </a>
                </div>
            </div>
        </div>
    </section>
</aside>
