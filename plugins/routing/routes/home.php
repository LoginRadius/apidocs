<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if (empty($document)) {//Home Page
        $is_404 = false;
        $sideMenus = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR .'sidebar.json'), true);
        require_once THEME_DIR . $hooks->apply_filters('docs_template', 'home') . '.php';
    }
}