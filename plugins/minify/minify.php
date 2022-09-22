<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
ob_start("sanitize_output");
function sanitize_output($buffer) {
    $search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s','/<!--(.|\s)*?-->/','/\s+/');
    $replace = array('>', '<', '\\1','',' ');
    return str_replace('> <', '><', preg_replace($search, $replace, $buffer));
}