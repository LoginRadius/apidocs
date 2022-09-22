<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_action('docs_template_status', 'vimeoTemplateStatus', 10, 2);

function vimeoTemplateStatus($is_404,$document) {
    global $hooks;
    if ($is_404) {
        if (!empty($document) && ($document == 'videos')) {
            $hooks->add_action('docs_head_script','vimeoTemplateStyle');
            $hooks->add_action('docs_head_script','vimeoTemplateScript');
            require_once THEME_DIR . $hooks->apply_filters('docs_template', '../../plugins/vimeo/template/video') . '.php';
            return false;
        }
    }
    return $is_404;
}

function vimeoTemplateStyle(){
    return docs_enqueue_style(PLUGIN_URL . "vimeo/assets/css/style.css");
}
function vimeoTemplateScript(){
    return docs_enqueue_script(PLUGIN_URL . "vimeo/assets/js/script.js");
}
