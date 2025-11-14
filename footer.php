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
		<div class="footer-bottom">
			<div class="footer-copyright">
				<p>
					<?php
					printf(
						/* translators: 1: Copyright symbol, 2: Current year, 3: Site name */
						esc_html__( '%1$s %2$s %3$s', 'ehriproject' ),
						'&copy;',
						esc_html( gmdate( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
					?>
				</p>
			</div>
			<div class="footer-social">
				<a href="https://bsky.app/profile/ehri-project.eu" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Follow EHRI on Bluesky (opens in new window)', 'ehriproject' ); ?>">
					<i class="fab fa-bluesky" aria-hidden="true"></i>
				</a>
				<a href="https://facebook.com/EHRIproject" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Follow EHRI on Facebook (opens in new window)', 'ehriproject' ); ?>">
					<i class="fab fa-facebook" aria-hidden="true"></i>
				</a>
				<a href="https://www.linkedin.com/company/ehri-european-holocaust-research-infrastructure/" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Follow EHRI on LinkedIn (opens in new window)', 'ehriproject' ); ?>">
					<i class="fab fa-linkedin" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
