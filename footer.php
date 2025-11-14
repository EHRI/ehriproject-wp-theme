<?php
/**
 * The template for displaying the footer.
 *
 * @package ehriproject-wp-theme
 */

?>

<footer id="footer" class="footer">
	<!-- Render the menus -->
	<?php
	wp_nav_menu(
		array(
			'menu'           => 'secondary-menu',
			'theme_location' => 'primary',
			'container'      => 'nav',
			'menu_class'     => 'menu',
			'menu_id'        => 'secondary-menu',
			'fallback_cb'    => false,
		)
	);
	?>
</footer>

<?php wp_footer(); ?>
<script>
	// Toggle menu class on body when #menubutton is clicked
	document.getElementById('menubutton').addEventListener('click', function () {
		document.body.classList.toggle('menu');
	});

</script>
</body>
</html>
