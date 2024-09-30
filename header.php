<?php
// With this snippet from header.php:
?>

<!DOCTYPE html>
<?php $home = get_home_url(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo get_the_title(); ?> | <?php echo get_bloginfo('description'); ?></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <meta name="dcterms.title" content="European Holocaust Research Infrastructure"/>
    <meta name="dcterms.type" content="Text"/>
    <meta name="dcterms.format" content="text/html"/>
    <meta name="dcterms.identifier" content="<?php echo $home; ?>/"/>

    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('favicon.png'); ?>" type="image/png"/>
    <meta name="robots" content="index, follow">

    <!-- include style.css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css"/>
    <?php wp_head(); ?>

</head>
<body>
<header class="main header">
    <div class="banner">
        <div class="logo">
            <a href="<?php echo $home ?>"><img src="<?php echo get_theme_file_uri('images/ehri-logo.svg'); ?>" alt="EHRI
            Logo"/></a>
        </div>
        <a href="/" class="title">
            EHRI
        </a>
    </div>
    <nav class="nav main-navbar">
        <label for="hb-toggle">Show menu</label>
        <input id="hb-toggle" type="checkbox"/>
        <span class="hb"></span>
        <span class="hb"></span>
        <span class="hb"></span>

        <?php wp_nav_menu(array(
            'menu' => 'main-menu',
            'theme_location' => 'primary',
            'container' => 'div',
            'container_class' => 'navbar',
            'menu_class' => 'menu',
            'menu_id' => 'main-menu',
            'fallback_cb' => false
        )); ?>

            <?php // Social media links ?>
    </nav>
</header>

