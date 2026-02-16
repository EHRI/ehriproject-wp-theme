<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package ehriproject-wp-theme
 */

?>

<aside class="sidebars region region-sidebar-second column sidebar">
	<section id="block-block-21" class="block block-block first odd">


			<div class="socmed">
				<a href="https://bsky.app/profile/ehri-project.eu" target="_blank" aria-label="<?php esc_attr_e( 'Follow EHRI on Bluesky (opens in new window)', 'ehriproject' ); ?>">
					<img alt="" src="<?php echo get_theme_file_uri( 'images/bluesky.png' ); ?>">
				</a>
				<a href="https://facebook.com/EHRIproject" target="_blank" aria-label="<?php esc_attr_e( 'Follow EHRI on Facebook (opens in new window)', 'ehriproject' ); ?>">
					<img alt="" src="<?php echo get_theme_file_uri( 'images/facebook.png' ); ?>">
				</a>
				<a href="https://www.linkedin.com/company/ehri-european-holocaust-research-infrastructure/" target="_blank" aria-label="<?php esc_attr_e( 'Follow EHRI on LinkedIn (opens in new window)', 'ehriproject' ); ?>">
					<img alt="" src="<?php echo get_theme_file_uri( 'images/linkedin2.png' ); ?>">
				</a>
			</div>
		</section>
		<section id="block-block-27" class="block block-block even">


			<div class="resources">
				<h2>Resources</h2>
				<!-- Render the sidebar menu resources menu -->
				<?php
				wp_nav_menu(
					array(
						'menu'           => 'resources-menu',
						'theme_location' => 'primary',
						'fallback_cb'    => false,
					)
				);
				?>
			</div>

		</section>
		<section id="block-views-latestnews-block-2" class="block block-views news last odd">
			<h2 class="block__title block-title">
				<a href="/latestnews" class="block-title-link"><?php esc_html_e( 'Latest News', 'ehriproject' ); ?></a>
			</h2>
			<div class="view view-latestnews view-id-latestnews view-display-id-block_2">

				<!-- Fetch a random gallery_item and use it as the header image -->
				<?php
				$latest_news_query = get_transient( 'ehri_latest_news' );
				if ( false === $latest_news_query ) {
					$args              = array(
						'post_type'      => 'post',
						'posts_per_page' => 3,
						'post_status'    => 'publish',
						'orderby'        => 'date',
						'order'          => 'DESC',
						'category_name'  => 'News',
						// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required for filtering.
						'tax_query'      => array(
							array(
								'taxonomy' => 'newsletter_category',
								'field'    => 'slug',
								'terms'    => array( 'Online' ),
								'operator' => 'OR',
							),
						),
					);
					$latest_news_query = new WP_Query( $args );
					set_transient( 'ehri_latest_news', $latest_news_query, 24 * HOUR_IN_SECONDS );
				}
				?>

				<div class="view-content">
					<?php if ( $latest_news_query->have_posts() ) : ?>
						<?php $num = 1; ?>
						<?php while ( $latest_news_query->have_posts() ) : ?>
							<?php $latest_news_query->the_post(); ?>
							<div class="views-row views-row-<?php echo $num; ?>	views-row-odd views-row-first">
								<div>
									<h3>
										<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
											<?php echo esc_html( get_the_title() ); ?>
										</a>
									</h3>
								</div>
							</div>
							<?php $num ++; ?>
							<?php endwhile; ?>
						<?php endif; ?>
				</div>

				<p class="more-link">
					<a href="/latestnews"><?php esc_html_e( 'More news...', 'ehriproject' ); ?></a>
				</p>
			</div>
		</section>
</aside>
