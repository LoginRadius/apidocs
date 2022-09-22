<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if (strpos($document, '/reference') !== false) {//Reference Page
        $is_404 = false;
        $sidebarMenu = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
        global $hooks;

        $hooks->add_action('docs_footer_script', 'referenceRedirection', 11, 0);

        function referenceRedirection() {
            if (file_exists(PLUGIN_DIR . 'routing/redirections/urls.json')) {
                $redirectURLS = file_get_contents(PLUGIN_DIR . 'routing/redirections/urls.json');
                ?>
                <script>
                    jQuery(document).ready(function () {
                        var hash = window.location.hash.substr(1);
                        var domainPath = window.location.pathname;
                        var currentUrlPath = domainPath + '#' + hash;
                        var oldURLRedirection = <?php echo $redirectURLS; ?>;
                        for(var key in oldURLRedirection){
                            if('/'+oldURLRedirection[key].oldLink == currentUrlPath){
                                window.location.href = '/'+oldURLRedirection[key].newLink;
                            }
                        }
                    });
                </script>
                <?php
            }
        }
        require_once THEME_DIR . $hooks->apply_filters('docs_template', 'home') . '.php';
    }
}
