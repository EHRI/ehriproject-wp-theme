<?php
/**
 * The search results template file.
 */

?>

<?php get_header(); ?>

    <main id="content">

        <section class="page-content" role="main">
            <?php if (have_posts()) : ?>

                <h1 class="page__title title" id="page-title">Search Results</h1>

                <?php if ($q = trim(get_search_query())): ?>
                    <h2 class="text-muted"><?php echo "\"$q\""; ?></h2>
                <?php endif; ?>

                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('loop-templates/content', 'news'); ?>
                <?php endwhile; ?>

                <!-- The pagination component -->
                <?php ehri_pagination(); ?>
            <?php endif; ?>
        </section>

        <?php get_sidebar(); ?>
    </main>

<?php get_footer(); ?>