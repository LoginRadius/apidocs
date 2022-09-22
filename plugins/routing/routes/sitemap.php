<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if ($document == 'sitemap.xml') {//sitemap xml
        $is_404 = false;
        require_once THEME_DIR . $hooks->apply_filters('docs_template', 'sitemap') . '.php';
    }
}