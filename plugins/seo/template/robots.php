<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
header("Content-type: text/plain");
$is_documentPage = $is_version = $is_supportPage = $is_apiPage = '';
$output = "User-Agent: *" . "\r\n";

    $output .= "Disallow:" . "\r\n";
    
    $output .= "Sitemap:"  .ROOT_URL . "sitemap.xml" . "/" . "\r\n";

echo $output;
