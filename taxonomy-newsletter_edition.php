<?php
/**
 * EHRI Newsletter template.
 *
 * @package ehriproject-wp-theme
 */

$newsletter_edition_slug = get_queried_object()->slug;
$newsletter_edition_name = get_queried_object()->name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="shortcut icon" href="<?php echo get_theme_file_uri( 'favicon.png' ); ?>" type="image/png"/>
	<link rel="canonical" href="<?php echo esc_attr( get_term_link( $newsletter_edition_slug, 'newsletter_edition' ) ); ?>"/>
	<link rel="shortlink" href="<?php echo esc_attr( get_term_link( $newsletter_edition_slug, 'newsletter_edition' ) ); ?>"/>
	<meta name="dcterms.title" content="EHRI Newsletter - <?php echo esc_html( $newsletter_edition_name ); ?>"/>
	<meta name="dcterms.type" content="Text"/>
	<meta name="dcterms.format" content="text/html"/>
	<meta name="dcterms.identifier" content="<?php the_permalink(); ?>"/>

	<title>EHRI Newsletter - <?php echo esc_html( $newsletter_edition_name ); ?></title>
	<?php $base_url = get_bloginfo( 'url' ); ?>
	<style>
		body {
			background-color: #ffffff;
			font: 14px Arial, Helvetica, sans-serif;
			color: #333;
			margin: 0;
			padding: 0;
		}

		div.container {
			width: 100%;
		}

		table.wrap {
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			margin-top: 0;
			border-bottom: 10px solid #a8026c;
			width: 560px;
		}

		tr, td {
			text-align: left;
		}

		td#top1 {
			height: 15px;
		}

		td#top2 {
			height: 129px;
		}

		td#top3 {
			height: 193px;
		}

		td#top4 {
			height: 29px;
			text-align: right;
			background-color: #9b0058;
			color: #ffffff;
		}

		td#social {
			text-align: center;
		}

		td#social a img {
			margin: 10px;
			border: 0;
		}

		td#video {
			text-align: center;
			font-size: 14px;
		}

		table.main {
			width: 100%;
			border: 0;
			padding: 0;
		}

		td.inset {
			width: 8px;
		}

		.topborder {
			font-size: 11px;
			text-align: center;
			background-color: #4e1965;
			height: 15px;
		}

		.topborder a {
			font-size: 11px;
			text-align: center;
			color: #ffffff;
		}

		.topborder a:hover {
			color: #ffffff;
			text-decoration: none;
		}

		p {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
		}

		a:link, .active, .readmore {
			color: #9b0058;
			text-decoration: none;
		}

		a:hover, .active:hover {
			color: #9b0058;
			text-decoration: underline;
		}

		.td_padding {
			padding-right: 16px;
			padding-left: 16px;
		}

		table.footer {
			width: 560px;
			border: 0;
		}

		td.institution_list {
			width: 280px;
		}

		.footer td {
			font-size: 11px;
			vertical-align: top;
		}

		.footer p {
			font-size: 11px;
			color: #666666;
			padding-right: 15px;
			padding-left: 15px;
		}

		.footer th {
			font-size: 20px;
			font-weight: 700;
			text-align: left;
			padding-left: 16px;
			border-top: 1px solid #666666;
			border-bottom: 1px solid #666666;
			padding-top: 5px;
			padding-bottom: 3px;
			color: #666666;
		}

		.footer .border {
			border-top: 1px solid #666666;
		}

		.footer ul {
			list-style: none;
			padding-left: 16px;
		}

		.footer li {
			color: #666666;
			background: url(<?php echo get_theme_file_uri( 'images/newsletter/bullet.gif' ); ?>) no-repeat 0 5px;
			padding-left: 10px;
		}

		.odd td {
			padding-top: 20px;
			padding-bottom: 20px;
		}

		h2 {
			font-weight: 400;
			margin: 0;
			padding: 0;
		}

		h2 a, h2 a:hover {
			color: #666666;
			text-decoration: none;
		}

		.even td {
			padding: 15px;
		}

		.even {
			background: #e4e4e4;
		}

		.odd img {
			float: right;
			margin-left: 10px;
		}

		.even img {
			float: left;
			padding-right: 10px;
		}

		.views-row-odd td {
			padding-top: 20px;
			padding-bottom: 20px;
		}

		.views-row-even td {
			padding: 8px;
		}

		.views-row-odd {
			background: #ffffff;
		}

		.views-row-even {
			background: #e4e4e4;
		}

		.views-row-odd img {
			float: right;
			margin-left: 10px;
		}

		.views-row-even img {
			float: left;
			padding-right: 10px;
		}

		h3 {
			font-size: 100%;
		}

		-->
	</style>
</head>
<body>

<div class="container">
	<table class="wrap">
		<tr>
			<td id="top1" class="topborder">&nbsp;</td>
		</tr>
		<tr>
			<td id="top2"><img src="<?php echo get_theme_file_uri( 'images/newsletter/logo.gif' ); ?>" alt=""/></td>
		</tr>
		<tr>
			<td id="top3"><img src="<?php echo get_theme_file_uri( 'images/newsletter/visual.jpg' ); ?>" alt=""/></td>
		</tr>
		<tr>
			<td id="top4" class="td_padding"><b>EHRI Newsletter - <?php echo esc_html( $newsletter_edition_name ); ?></b></td>
		</tr>

		<?php
		$args = array(
			'post_status'    => 'publish',
			'category_name'  => 'news',
			'post_type'      => 'post', // Your Post type Name that You Registered.
			'posts_per_page' => 15,
			'order'          => 'DESC',
			'orderby'        => 'date',
			// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required for filtering.
			'tax_query'      => array(
				array(
					'taxonomy' => 'newsletter_edition',
					'field'    => 'slug',
					'terms'    => $newsletter_edition_slug,
				),
			),
		);

		$the_query  = new WP_Query( $args );
		$post_count = 0;
		?>

		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : ?>
				<?php
				$the_query->the_post();
				$post_count++;
				?>

				<tr class="views-row views-row-<?php echo $post_count; ?> views-row-<?php echo 0 === $post_count % 2 ? 'even' : 'odd'; ?>">
					<td>
						<table class="main">
							<tr>
								<td colspan="2">
									<div class="field field-title">
										<h2>
											<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
									</div>
								</td>
							</tr>
							<tr>
								<td class="inset">&nbsp;</td>
								<td>
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="field field-photo">
											<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>" alt="<?php echo get_the_title(); ?>"/>
										</div>
									<?php endif; ?>
									<div class="field field-datum">
								<span class="date-display-single">
									<?php echo get_the_date( 'd/m/Y' ); ?>
								</span>
									</div>
									<div class="field field-body">
										<?php echo drupal_text_summary( get_the_content(), $max_length = 600 ); ?>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<span class="readmore">
										<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">Read more &gt;
									</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			<?php endwhile; ?>
		<?php endif; ?>


		<tr>
			<td>
				<table class="footer">
					<tr>
						<td class="border">
							<p>EHRI, European Holocaust Research Infrastructure, NIOD. Institute for War, Holocaust and
								Genocide Studies, Herengracht 380, NL-1016 CJ Amsterdam, The
								Netherlands, +31(0)20-5233800 &copy; 2011 EHRI</p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td id="video">
							Watch a <a class="active" target="_blank" href="https://youtu.be/IUFqR7l5qW8">video
								introduction to the EHRI Portal</a>
						</td>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td id="social">
				<a href="https://bsky.app/profile/ehri-project.eu">
					<img alt="Bluesky Icon"
						src="<?php echo get_theme_file_uri( 'images/bluesky.png' ); ?>"
						width="50" height="50">
				</a>
				<a href="https://facebook.com/EHRIproject">
					<img alt="Facebook Icon"
						src="<?php echo get_theme_file_uri( 'images/facebook.png' ); ?>"
						width="50" height="50">
				</a>
				<a href="https://www.linkedin.com/company/ehri-european-holocaust-research-infrastructure/">
					<img alt="LinkedIn Icon"
						src="<?php echo get_theme_file_uri( 'images/linkedin2.png' ); ?>"
						width="50" height="50">
				</a>
			</td>
		</tr>
	</table>
</div>

</body>
</html>
