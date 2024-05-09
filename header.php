<?php
/**
 * The header for our theme.
 */
?>

<!DOCTYPE html>

<head>
    <?php $home = get_home_url(); ?>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('favicon.png'); ?>" type="image/png"/>
    <link rel="canonical" href="<?php echo $home; ?>"/>
    <link rel="shortlink" href="<?php echo $home; ?>"/>
    <meta name="dcterms.title" content="European Holocaust Research Infrastructure"/>
    <meta name="dcterms.type" content="Text"/>
    <meta name="dcterms.format" content="text/html"/>
    <meta name="dcterms.identifier" content="<?php echo $home; ?>/"/>
    <title>European Holocaust Research Infrastructure |</title>

    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">

    <?php wp_head(); ?>

    <!-- include style.css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css"/>

    <style>
        /** NB: this styles the sidebar buttons and should be moved to the stylesheet **/
        .socmed {
            padding-left: 10px;
        }

        .socmed img {
            margin-right: 10px;
            width: 30px;
            height: auto;
        }

        .resources {
            padding: 0 0 10px 10px;
        }

        .resources h2 {
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            display: block;
            background-image: url(<?php echo get_theme_file_uri('images/resources2.png'); ?>);
            background-repeat: no-repeat;
            background-size: 240px auto;
            background-position: 0 28px;
            height: 40px;
            width: 240px;
            background-position: left top;
            margin: 0;
        }

        .resources h3 a:hover {

            color: #36104F;
        }

        .resources ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .resources li {
            background-image: url(<?php echo get_theme_file_uri('images/dot3.png'); ?>);
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 1.5em;
            line-height: 1.5em;
            font-weight: 700;
            font-size: 1em;
            margin-top: 1.5em;
        }

        .resources li:hover {
            background-image: url(<?php echo get_theme_file_uri('images/dot.png'); ?>);
        }

        .resources li a {
            padding-left: 0.8em;
            text-decoration: none;
        }

        #secondary-menu {
            margin-top: 2em;
        }

        #secondary-menu a {
            color: #fff;
        }

        #secondary-menu li {
            display: block !important;
        }
    </style>

    <script src="//use.typekit.com/yha1waw.js"></script>
    <script>
      try {
        Typekit.load();
      } catch (e) {
      }
    </script>

</head>
<body  <?php body_class(array('sidebar-second', 'html')); ?>>
<p id="skip-link">
    <a href="#main-menu" class="element-invisible element-focusable">Jump to navigation</a>
</p>

<div id="page">
    <header class="header" id="header" role="banner">
        <div id="logoregion">
            <div class="region region-highlighted">
                <div id="block-block-20" class="block block-block first odd">


                    <div id="menubutton">menu</div>
                </div>
                <div id="block-block-9" class="block block-block even">


                    <h1 id="logo"><a href="/">EHRI- European Holocaust Research Infrastructure</a></h1>
                </div>
                <div id="block-search-form" class="block block-search last odd" role="search">


                    <form action="/" id="search-block-form" accept-charset="UTF-8">
                        <div>
                            <div class="container-inline">
                                <h2 class="element-invisible">Search form</h2>
                                <div class="form-item form-type-textfield form-item-search-block-form">
                                    <label class="element-invisible" for="edit-search-block-form--2">Search </label>
                                    <input title="Enter the terms you wish to search for." type="text"
                                           id="edit-search-block-form--2" name="s" value="" size="15"
                                           maxlength="128" class="form-text"/>
                                </div>
                                <div class="form-actions form-wrapper" id="edit-actions"><input type="submit"
                                                                                                id="edit-submit"
                                                                                                name="op" value="Search"
                                                                                                class="form-submit"/>
                                </div>
                                <input type="hidden" name="form_build_id"
                                       value="form-LcEZCveJSgmdVtWdSwZ4OLprKyFUkhgs1FvfQCxYR7k"/>
                                <input type="hidden" name="form_id" value="search_block_form"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="navigation">
            <div class="header__region region region-header">
                <div class="view view-header-image">
                    <!-- Fetch a random gallery_item and use it as the header image -->
                    <?php

                    if (false === ($gallery_items = get_transient('ehri_gallery_items'))) {
                        $args = array(
                            'post_type' => 'gallery_item',
                            'orderby' => 'rand'
                        );
                        $gallery_items = new WP_Query($args);
                        set_transient('ehri_gallery_items', $gallery_items, 24 * HOUR_IN_SECONDS);
                    }
                    if ($gallery_items->have_posts()) {
                        shuffle($gallery_items->posts);
                        while ($gallery_items->have_posts()) {
                            $gallery_items->the_post();
                            echo ehriproject_header_element(get_the_title());
                            break;
                        }
                    } ?>
                </div>
            </div>
            <div class="region region-navigation">
                <!-- Render the menus -->
                <?php wp_nav_menu(array(
                    'menu' => 'main-menu',
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'main-menu-container',
                    'menu_class' => 'menu',
                    'menu_id' => 'main-menu',
                    'fallback_cb' => false
                )); ?>
            </div>
        </div>
    </header>
    <!-- /#page ends in footer.php -->
