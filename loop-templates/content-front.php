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

<div class="resource-card" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="resource-img">
        <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo get_the_title(); ?>">
            <?php echo ehrieric_teaser_element(null, $alt_text = get_the_title()); ?>
        </a>
    </div>
    <div class="resource-info">
        <!-- render the title as a link -->
        <header>
            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo get_the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </header>
    </div>
</div><!-- #post-## -->