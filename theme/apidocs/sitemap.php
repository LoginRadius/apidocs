<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>' . "\r\n";
echo '<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">' . "\r\n";
echo "<url>" . "\r\n";
echo "<loc>" . ROOT_URL . "</loc>" . "\r\n";
echo "<lastmod>" . date("Y-m-d") . "</lastmod>" . "\r\n";
echo "<changefreq>monthly</changefreq>" . "\r\n";
echo "<priority>0.8</priority>" . "\r\n";
echo "</url>" . "\r\n";
echo generateXML('sidebar');
$versioning = json_decode(file_get_contents(DATABASE . "/version.json"));
foreach ($versioning as $versions) {
    if (isset($versions->status) && $versions->status == 'public') {
        echo generateXML($versions->value);
    }
}
echo generateXML('posts');
echo '</urlset>';

function generateXML($is_version) {
    $output = '';
    if (in_array($is_version, array('v1', 'v2', 'sidebar'))) {
        $path = API_MENU_DIR;
        $urlPath = API_DOCS_URL . "/";
        if ($is_version == 'sidebar') {
            $path = SUPPORT_DOCS_MENU_DIR;
            $urlPath = ROOT_URL;
        }
        $menus = json_decode(file_get_contents( $path.$is_version. '.json'), true);
        foreach ($menus as $k => $menu) {
            foreach ($menu as $key => $value) {
                foreach ($value as $k => $v) {
                    $url = stripslashes($v['url']);
                    $date = date("Y-m-d");
                    $output .= "<url>" . "\r\n";
                    $output .= "<loc>" . $urlPath . $url . "</loc>" . "\r\n";
                    $output .= "<lastmod>" . $date . "</lastmod>" . "\r\n";
                    $output .= "<changefreq>monthly</changefreq>" . "\r\n";
                    $output .= "<priority>0.8</priority>" . "\r\n";
                    $output .= "</url>" . "\r\n";
                }
            }
        }
    } else {
        $posts = json_decode(file_get_contents(ROOT_URL . API_MENU_DIR . $is_version . ".json"), true);
        foreach ($posts as $k => $v) {
            $url = stripslashes($v['url']);
            $date = date("Y-m-d", strtotime($v['date']));
            $output .= "<url>" . "\r\n";
            $output .= "<loc>" . API_CHANGELOG_URL . '/' . $url . "</loc>" . "\r\n";
            $output .= "<lastmod>" . $date . "</lastmod>" . "\r\n";
            $output .= "<changefreq>monthly</changefreq>" . "\r\n";
            $output .= "<priority>0.8</priority>" . "\r\n";
            $output .= "</url>" . "\r\n";
        }
    }
    return $output;
}
