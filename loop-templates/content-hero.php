<?php
/**
 * Front page template.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div <?php post_class( 'front-page' ); ?> id="post-<?php the_ID(); ?>">
	<?php the_content(); ?>
</div>

