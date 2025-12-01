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

<div <?php post_class( 'hero-title' ); ?> id="post-<?php the_ID(); ?>">
	<header class="hero-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="hero-image">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
		<?php endif; ?>
		<h1><?php the_title(); ?></h1>
	</header>
</div>
<div class="hero-body">
	<?php the_content(); ?>
</div>
