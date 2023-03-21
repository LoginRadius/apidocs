</article>
</div>
</div>

<div id="loading-bar"></div>
<?php
docs_enqueue_script(THEME_URL . "assets/javascripts/marked.min.js");
docs_enqueue_script(THEME_URL . "support-assets/js/custom.js");
$hooks->do_action('docs_footer_script');
if (isset($supportContent)) {
    ?>
    <script>
        jQuery(document).ready(function () {
            pageLoad(window.location.pathname);
        });
        
    </script>
    
<?php } ?>
</body>

</html>
