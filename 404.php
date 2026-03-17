<?php
/**
 * The template for displaying all single posts.
 *
 * @package ehriproject-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content">
	<section class="page-content">
		<header class="post-header">
			<h1 class="post-title">
				<?php esc_html_e( '404: Page not found', 'ehriproject' ); ?>
			</h1>
		</header>

		<p class="post-body">
		<?php
		esc_html_e(
			'Sorry, the page you are looking for does not exist at this address. The search function might help you locate it.',
			'ehriproject'
		);
		?>
			</p>
	</section>
</main>

<?php get_footer(); ?>
