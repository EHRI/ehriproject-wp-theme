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
<!--        <a href="/" class="title">-->
<!--            EHRI-->
<!--        </a>-->
    </div>
    <nav class="nav main-navbar">
        <label for="hb-toggle">Show menu</label>
        <input id="hb-toggle" type="checkbox"/>
        <span class="hb"></span>
        <span class="hb"></span>
        <span class="hb"></span>

        <div class="navbar">
                <?php wp_nav_menu(array(
                    'menu' => 'main-menu',
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => 'navbar-menu',
                    'menu_class' => 'menu',
                    'menu_id' => 'main-menu',
                    'fallback_cb' => false
                )); ?>

                <label class="screen-reader-text" for="search-toggle">Show search bar</label>
                <input id="search-toggle" type="checkbox"/>
                <div class="search-controls">
                    <form role="search" method="get" id="search-form" class="search-form" action="<?php echo $home; ?>">
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="s" id="s">
                        <input type="submit" id="search-submit" value="Search">
                    </form>
                </div>
                <i id="search-icon" class="fa fa-fw fa-search"></i>
                <span class="st-x"></span>
                <span class="st-x"></span>
        </div>

            <?php // Social media links ?>
    </nav>
</header>

