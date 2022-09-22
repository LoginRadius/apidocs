<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_filter('docs_styles_url', 'release_style_version', 10, 1);
$hooks->add_filter('docs_script_url', 'release_style_version', 10, 1);

function release_style_version($url) {
    if (strpos($url, '?') > 0) {
            $url .= '&';
        } else {
            $url .= '?';
        }
        $url .= filemtime(__FILE__);
    return $url;
}
