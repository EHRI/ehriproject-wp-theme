<?php
/**
 * The template for displaying the footer.
 */
?>

<footer id="footer" class="region region-footer">
    <div id="block-menu-secondary-menu" class="block block-menu first odd" role="navigation">


        <ul class="menu">
            <li class="menu__item is-leaf first leaf"><a href="/contact-us" title="Contact us"
                                                         class="menu__link">Contact</a></li>
            <li class="menu__item is-leaf leaf item"><a href="/accessibility" class="menu__link item">Accessibility</a>
            </li>
            <li class="menu__item is-leaf last leaf item"><a href="/privacy-statement" class="menu__link item">Privacy
                    Statement</a></li>
        </ul>
    </div>
    <div id="block-block-17" class="block block-block funding even">


        <a href="http://europa.eu/" target="_blank">EHRI is funded by the European Union</a>
    </div>
    <div id="block-block-23" class="block block-block ars last odd">


        <a href="http://prix2018.aec.at/prixwinner/28933/" target="_blank"><img alt="Ars Electronica" height="100"
                                                                                src="<?php echo get_theme_file_uri('images/ars_logo_cropped.jpg'); ?>"
                                                                                width="200"/></a>
    </div>
</footer>

</div> <!-- /#page -->

<?php wp_footer(); ?>
<script>
  // Toggle menu class on body when #menubutton is clicked
  document.getElementById('menubutton').addEventListener('click', function () {
    console.log("clicked")
    document.body.classList.toggle('menu');
  });

</script>
</body>
</html>
