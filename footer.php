<?php
/**
 * The template for displaying the footer.
 *
 * @package ehriproject-wp-theme
 */

?>

<footer id="footer" class="footer main">
	<div class="footer-content">
		<div class="navbar">
			<ul class="footer-menu" id="footer-menu-items">
				<!-- Render the menus -->
				<?php
				wp_nav_menu(
					array(
						'menu'       => 'footer-menu',
						'container'  => false,
						'items_wrap' => '%3$s', // don't wrap the items in a <ul>.
					)
				);
				?>
			</ul>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
