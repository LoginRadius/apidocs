<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_action('docs_footer_script', 'nightmodescript', 10, 0);

function nightmodescript(){
    docs_enqueue_style(PLUGIN_URL . "night-mode/assets/css/nightmode.css");
    docs_enqueue_script(PLUGIN_URL . "night-mode/assets/js/nightmode.js");
?>
<?php
}
