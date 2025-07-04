<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div id="main">
	<div id="main-inner">

		<div id="content" class="column" role="main">
			<div id="content-inner">
				<h1>404: Page not found</h1>

				<p>Sorry, the page you are looking for does not exist at this address.
					The search function might help you locate it.</p>
			</div>
		</div>

		<?php
		get_sidebar(); ?>

	</div>
</div>


<?php
get_footer(); ?>
