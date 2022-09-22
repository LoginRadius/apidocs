<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if (in_array($document, array('preview'))) {//previews auth
        if (!isset($_COOKIE['password']) || $_COOKIE['password'] != "allow") {
            die("Access denied ...");
        }
        $is_404 = false;
        require_once THEME_DIR . $hooks->apply_filters('docs_template', $document) . '.php';
    } elseif ($document == 'auth/allow') {//previews auth allow
        $is_404 = false;
        setcookie("password", "allow", time() + (86400 * 30), "/");
    }
}