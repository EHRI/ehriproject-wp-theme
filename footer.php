<?php
/**
 * The template for displaying the footer.
 */
?>

<?php $home = get_home_url(); ?>
<footer class="main footer">
    <div class="footer-content">
        <div class="footer-headings">
            <div class="logo">
                <a href="<?php echo $home; ?>"><img
                            src="<?php echo get_template_directory_uri() . '/images/ehri-logo-beige.svg';
                            ?>" alt="ehri
                logo"/></a>
            </div>
            <a href="<?php echo $home; ?>" class="title"><?php echo get_bloginfo('title'); ?></a>
        </div>

        <!--        {{ partial "footer-menu-1.html" .}}-->
        <!---->
        <!--        {{ partial "footer-menu-2.html" . }}-->
        <!---->
        <!--        {{ partial "footer-menu-3.html" . }}-->
        <!---->
        <!--        {{ partial "social.html" . }}-->
        <!---->
        <!--        {{ partial "footer-funders.html" . }}-->
        <!---->
        <!--        {{ partial "footer-copyright.html" . }}-->
    </div>
</footer>

<?php wp_footer(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      let searchToggle = document.getElementById('search-toggle');
      let searchInput = document.getElementById('search-input');
      searchToggle.addEventListener('change', function() {
        if (searchToggle.checked) {
          searchInput.focus();
        }
      });
    });
</script>
</body>
</html>
