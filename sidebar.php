<?php
/**
 * The sidebar containing the main widget area.
 */
?>

<aside class="sidebars">
    <section class="region region-sidebar-second column sidebar">
        <div id="block-block-21" class="block block-block first odd">


            <div class="socmed">follow us on: <br/>
                <a href="https://twitter.com/EHRIproject" target="_blank"><img alt="Twitter"
                                                                               src="<?php echo get_theme_file_uri('images/twitter.png'); ?>"></a>

                <a href="https://facebook.com/EHRIproject" target="_blank"><img alt="Facebook"
                                                                                src="<?php echo get_theme_file_uri('images/facebook.png'); ?>"/></a>

                <a href="https://www.linkedin.com/company/ehri-european-holocaust-research-infrastructure/"
                   target="_blank"><img alt="LinkedIn" src="<?php echo get_theme_file_uri('images/linkedin2.png'); ?>"/></a>
            </div>
        </div>
        <div id="block-block-27" class="block block-block even">


            <div class="resources">
                <h2>Resources</h2>
                <!-- Render the sidebar menu resources menu -->
                <?php wp_nav_menu(array(
                    'menu' => 'resources-menu',
                    'theme_location' => 'primary',
                    'fallback_cb' => false
                )); ?>
            </div>

        </div>
        <div id="block-views-latestnews-block-2" class="block block-views news last odd">

            <h2 class="block__title block-title"><a href="/latestnews" class="block-title-link"></a></h2>

            <div class="view view-latestnews view-id-latestnews view-display-id-block_2 view-dom-id-cd819287d9ba73b1478531a088de54d4">


                <div class="view-content">
                    <div class="views-row views-row-1 views-row-odd views-row-first">

                        <div><h3>
                                <a href="/call-proposals-ehri-academic-conference-2024-researching-holocaust-digital-age">Call
                                    for Proposals | EHRI Academic Conference - Researching the Holocaust in the Digital
                                    Age</a></h3></div>
                    </div>
                    <div class="views-row views-row-2 views-row-even">

                        <div><h3><a href="/new-ehri-document-blog-town-mizoch-map-holocaust">New EHRI Document Blog |
                                    The Ukrainian Town of Mizoch on the Map of the Holocaust</a></h3></div>
                    </div>
                    <div class="views-row views-row-3 views-row-odd views-row-last">

                        <div><h3><a href="/message-support-our-israeli-friends">A Message of Support for Our Israeli
                                    Friends </a></h3></div>
                    </div>
                </div>


                <div class="more-link">
                    <a href="/latestnews">
                        More news... </a>
                </div>
            </div>
        </div>
    </section>
</aside>
