<?php
/**
 * The main template file.
 */

?>

<?php get_header(); ?>

<section class="hero">
    <div class="hero-content">
        <h1>Towards a permanent European Holocaust Research Infrastructure</h1>
        <p>Since 2010 EHRI has worked to build a sustainable infrastructure to support scholarship into the Holocaust.
            From 2025, it will become a permanent organisation in the form of a European Research Infrastructure Consortium (ERIC).
        </p>
        <p><a href="/towards-a-permanent-holocaust-research-infrastructure">Read more...</a></p>
    </div>
</section>

<main id="content">

    <section class="home services">
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