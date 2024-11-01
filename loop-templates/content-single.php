<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>


<h1 class="post-title" id="page-title"><?php the_title(); ?></h1>

<?php if (has_post_thumbnail()): ?>
    <picture class="featured-image">
        <?php the_post_thumbnail('large'); ?>
    </picture>
<?php endif; ?>

<div class="post-body">
    <?php the_content(); ?>
</div>
