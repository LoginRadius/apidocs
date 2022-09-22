<?php

function docs_enqueue_style($url, $version = false) {
    global $hooks;
    if ($version) {
        if (strpos($url, '?') > 0) {
            $url .= '&';
        } else {
            $url .= '?';
        }
        $url .= 'ver=1.0';
    }
    echo '<link rel="stylesheet" href="' . $hooks->apply_filters('docs_styles_url', $url) . '" />';
}

function docs_enqueue_script($url, $version = false) {
    global $hooks;
    if ($version) {
        if (strpos($url, '?') > 0) {
            $url .= '&';
        } else {
            $url .= '?';
        }
        $url .= 'ver=1.0';
    }
    echo '<script type="text/javascript" src="' . $hooks->apply_filters('docs_script_url', $url) . '"></script>';
}
