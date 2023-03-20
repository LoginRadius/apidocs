<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_filter('api_docs_tabs', 'api_docs_tabs_for_code', 11, 1);

function api_docs_tabs_for_code($docs){
    docs_enqueue_style(PLUGIN_URL . "copy-code/assets/css/copycode.css");
    docs_enqueue_script(PLUGIN_URL . "copy-code/assets/js/copycode.min.js");
?>

<!-- <div class="code_popup_view_button">Code</div> -->
<?php
}
