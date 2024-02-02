<?php
/**
 * The header for our theme.
 */
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="https://www.ehri-project.eu/sites/default/files/favicon.png" type="image/png"/>
    <link rel="canonical" href="http://localhost/"/>
    <link rel="shortlink" href="http://localhost/"/>
    <meta name="dcterms.title" content="European Holocaust Research Infrastructure"/>
    <meta name="dcterms.type" content="Text"/>
    <meta name="dcterms.format" content="text/html"/>
    <meta name="dcterms.identifier" content="http://localhost/"/>
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

        .resources h3 {
            background-image: url(<?php echo get_theme_file_uri('images/dot3.png'); ?>);
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 1.5em;
        }

        .resources h3:hover {
            background-image: url(<?php echo get_theme_file_uri('images/dot.png'); ?>);
        }

        .resources h3 a {
            padding-left: 0.8em;
        }

        #block-menu-secondary-menu {
            margin-top: 2em;
        }

        #block-menu-secondary-menu a {
            color: #fff;
        }

        #block-menu-secondary-menu.block-menu li {
            display: block !important;

        }
    </style>

    <script src="http://use.typekit.com/yha1waw.js"></script>
    <script>
      try {
        Typekit.load();
      } catch (e) {
      }
    </script>

</head>
<body  <?php body_class(); ?>>
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
                <div class="view view-header-image view-id-header_image view-display-id-block_1 view-dom-id-4420625f9abc35441a440f3f3fe6d08f">
                    <div class="field-content">
                        <picture>
                            <source srcset="https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_desktop_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=bNwpXI6N&amp;timestamp=1664406849 1x, https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_desktop_2x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=uD9cl3_d&amp;timestamp=1664406849 2x"
                                    media="(min-width: 1200px)"/>
                            <source srcset="https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_tablet_landscape_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=LSIgX792&amp;timestamp=1664406849 1x, https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_tablet_landscape_2x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=RLdHrWPN&amp;timestamp=1664406849 2x"
                                    media="(min-width: 960px)"/>
                            <source srcset="https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_tablet_landscape_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=LSIgX792&amp;timestamp=1664406849 1x, https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_tablet_landscape_2x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=RLdHrWPN&amp;timestamp=1664406849 2x"
                                    media="(min-width: 480px)"/>
                            <source srcset="https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_mobiel_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=vWUriaHF&amp;timestamp=1664406849 1x, https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_mobiel_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=vWUriaHF&amp;timestamp=1664406849 2x"
                                    media="(min-width: 0px)"/>
                            <!--[if IE 9]></video><![endif]-->
                            <img src="https://www.ehri-project.eu/sites/default/files/styles/headerbeeldcustom_user_mobiel_1x/public/Auschwitz%20Monument%20Amsterdam%201.JPG?itok=vWUriaHF&amp;timestamp=1664406849"
                                 alt="" title=""/>
                        </picture>
                    </div>
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
                    'fallback_cb' => false,
                    'walker' => new EP_Walker_Nav_Menu(),
                )); ?>

<!--                <div id="block-menu-menu-about" class="block block-menu submenu first odd" role="navigation">-->
<!---->
<!--                    <ul class="menu">-->
<!--                        <li class="menu__item is-expanded first expanded item"><a href="/about-ehri"-->
<!--                                                                                  class="menu__link item">About EHRI</a>-->
<!--                            <ul class="menu">-->
<!--                                <li class="menu__item is-leaf first leaf item"><a href="/consortium"-->
<!--                                                                                  title="EHRI Consortium Partners"-->
<!--                                                                                  class="menu__link item">Our-->
<!--                                        Partners</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/our-staff"-->
<!--                                                                            title="EHRI Project Management Team members and contact"-->
<!--                                                                            class="menu__link item">Our Staff</a></li>-->
<!--                                <li class="menu__item is-collapsed collapsed"><a href="/division-work"-->
<!--                                                                                 title="Work Plan Table EHRI Preparatory Phase"-->
<!--                                                                                 class="menu__link item">Workplan&amp;Deliverables</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/ehri-for-institutions"-->
<!--                                                                            title="EHRI for Collection Holding Institutions"-->
<!--                                                                            class="menu__link item">EHRI for-->
<!--                                        Institutions</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/scientific-advisory-board"-->
<!--                                                                            title="Scientific Advisory Board EHRI"-->
<!--                                                                            class="menu__link item">Advisory Board</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf last leaf item"><a href="/project-overview"-->
<!--                                                                                 title="Overview of EHRI Projects"-->
<!--                                                                                 class="menu__link item">Project-->
<!--                                        Overview</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu__item is-leaf last leaf item"><a href="/about-ehri"-->
<!--                                                                         class="menu__link item menubalk">About EHRI</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div id="block-menu-menu-get-involved" class="block block-menu submenu even" role="navigation">-->
<!---->
<!---->
<!--                    <ul class="menu">-->
<!--                        <li class="menu__item is-expanded first expanded item"><a href="/ehri-getting-involved"-->
<!--                                                                                  title="News and Press"-->
<!--                                                                                  class="menu__link item">News &amp;-->
<!--                                Press</a>-->
<!--                            <ul class="menu">-->
<!--                                <li class="menu__item is-leaf first leaf"><a href="/latestnews" class="menu__link item">News-->
<!--                                        items</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a-->
<!--                                            href="/ehri-podcast-for-the-living-and-the-dead"-->
<!--                                            title="Podcast For the Living and the Dead. Traces of the Holocaust"-->
<!--                                            class="menu__link item">EHRI Podcast Series</a></li>-->
<!--                                <li class="menu__item is-collapsed collapsed item"><a href="/ehri-archive"-->
<!--                                                                                      title="Archive of Past Events"-->
<!--                                                                                      class="menu__link item">EHRI-->
<!--                                        Archive</a></li>-->
<!--                                <li class="menu__item is-leaf leaf"><a href="/berlin-conference-film"-->
<!--                                                                       title="EHRI Videos" class="menu__link item">EHRI-->
<!--                                        Videos</a></li>-->
<!--                                <li class="menu__item is-leaf last leaf"><a href="/press" title="Press"-->
<!--                                                                            class="menu__link item">Press</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu__item is-leaf last leaf item"><a href="/ehri-getting-involved"-->
<!--                                                                         class="menu__link item menubalk">News &amp;-->
<!--                                Press</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div id="block-menu-menu-research" class="block block-menu submenu odd" role="navigation">-->
<!---->
<!---->
<!--                    <ul class="menu">-->
<!--                        <li class="menu__item is-expanded first expanded item"><a-->
<!--                                    href="https://training.ehri-project.eu/" title="EHRI Training and Events"-->
<!--                                    class="menu__link item">Training and Events</a>-->
<!--                            <ul class="menu">-->
<!--                                <li class="menu__item is-leaf first leaf item"><a href="/ehri-seminars-0"-->
<!--                                                                                  title="Calls for EHRI Seminars"-->
<!--                                                                                  class="menu__link item">EHRI-->
<!--                                        Seminars</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/ehri-workshops-0"-->
<!--                                                                            title="Calls for EHRI Workshops"-->
<!--                                                                            class="menu__link item">EHRI Workshops</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/ehri-webinars"-->
<!--                                                                            title="EHRI Webinars on Zoom"-->
<!--                                                                            class="menu__link item">EHRI Webinars</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf last leaf item"><a-->
<!--                                            href="https://training.ehri-project.eu/"-->
<!--                                            title="EHRI Online Course in Holocaust Studies" class="menu__link item">Online-->
<!--                                        Course</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu__item is-leaf last leaf item"><a href="/training-0"-->
<!--                                                                         title="EHRI Online Course in Holocaust Studies"-->
<!--                                                                         class="menu__link item menubalk">Training and-->
<!--                                Events</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div id="block-menu-menu-publications" class="block block-menu submenu even" role="navigation">-->
<!---->
<!---->
<!--                    <ul class="menu">-->
<!--                        <li class="menu__item is-expanded first expanded item"><a href="/Conny-Kristel-Fellowships"-->
<!--                                                                                  class="menu__link item">Kristel-->
<!--                                Fellowships</a>-->
<!--                            <ul class="menu">-->
<!--                                <li class="menu__item is-leaf first last leaf"><a href="/ehri-fellows-2016"-->
<!--                                                                                  title="EHRI Conny Kristel Fellows"-->
<!--                                                                                  class="menu__link item">Conny Kristel-->
<!--                                        Fellows</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu__item is-collapsed last collapsed item"><a href="/Conny-Kristel-Fellowships"-->
<!--                                                                                   class="menu__link item menubalk">Kristel-->
<!--                                Fellowships</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div id="block-menu-menu-community-hub" class="block block-menu submenu last odd" role="navigation">-->
<!---->
<!---->
<!--                    <ul class="menu">-->
<!--                        <li class="menu__item is-expanded first expanded item"><a-->
<!--                                    href="/online-course-holocaust-studies" title="EHRI Online Services"-->
<!--                                    class="menu__link item">Online Services</a>-->
<!--                            <ul class="menu">-->
<!--                                <li class="menu__item is-leaf first leaf"><a href="https://portal.ehri-project.eu/"-->
<!--                                                                             title="EHRI Online Portal to Holocaust-related Sources"-->
<!--                                                                             class="menu__link item" target="_blank">EHRI-->
<!--                                        Portal</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/ehri-collection-digital-tools-guides"-->
<!--                                                                            title="EHRI Collection of Digital Tools Guides"-->
<!--                                                                            class="menu__link item">Digital Tools-->
<!--                                        Guides</a></li>-->
<!--                                <li class="menu__item is-leaf leaf"><a href="https://blog.ehri-project.eu/"-->
<!--                                                                       title="EHRI Document Blog"-->
<!--                                                                       class="menu__link item" target="_blank">Document-->
<!--                                        Blog</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a-->
<!--                                            href="https://geodata.ehri-project.eu/geonetwork/srv/eng/catalog.search#/home"-->
<!--                                            title="EHRI Geospatial Repository" class="menu__link item" target="_blank">Geospatial-->
<!--                                        Repository</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="/ehri-online-editions"-->
<!--                                                                            title="EHRI Online Editions"-->
<!--                                                                            class="menu__link item">Online Editions</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="https://hal.science/EHRI"-->
<!--                                                                            title="EHRI Publication Repository in HAL"-->
<!--                                                                            class="menu__link item" target="_blank">Publication-->
<!--                                        Repository</a></li>-->
<!--                                <li class="menu__item is-leaf leaf item"><a href="https://portal.ehri-project.eu/guides"-->
<!--                                                                            title="Terezín Research Guide and Jewish Councils Research Guide"-->
<!--                                                                            class="menu__link item">Research Guides</a>-->
<!--                                </li>-->
<!--                                <li class="menu__item is-leaf last leaf item"><a href="https://irp2.ehri-project.eu/"-->
<!--                                                                                 title="International Research Portal for Records Related to Nazi-Era Cultural Property"-->
<!--                                                                                 class="menu__link item"-->
<!--                                                                                 target="_blank">IRP2 Portal</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="menu__item is-leaf last leaf item"><a href="/online-course-holocaust-studies"-->
<!--                                                                         class="menu__link item menubalk">Online-->
<!--                                Services</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </header>
    <!-- /#page ends in footer.php -->
