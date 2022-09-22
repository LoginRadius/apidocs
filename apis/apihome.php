<?php

require_once '../config.php';
require_once CLASSES_DIR.'loader.php';
$version = isset($_GET['version']) ? $_GET['version'] : '';

function createSideBar($pattern, $dirReplace, $count, $format = 'md') {
    $output = array();
    $files = glob($pattern, GLOB_NOSORT);
    $count++;
    foreach ($files as $file) {
        if (is_dir($file)) {
            $tempDie = explode('/', $file);
            $output[getTitle($tempDie)] = createSideBar($file . '/*', $dirReplace, $count, $format);
        } else {
            if (strpos($file, 'index.html') > 0) {
                continue;
            }
            $href = str_replace($dirReplace, "", rtrim(rtrim($file, $format), '.'));
            $apiObject = explode('/', $href);
            $output[] = array(
                "url" => str_replace('../', '', $href),
                "title" => getTitle($apiObject),
            );
        }
    }
    return $output;
}

function getTitle($array) {
    return ucwords(str_replace('-', ' ', preg_replace('/(?<!\ )[A-Z]/', ' $0', $array[count($array) - 1])));
}

if (!empty($version) && is_dir('../' . API_DOC_DIR . $version . '/')) {
    if (file_exists('../' . API_MENU_DIR . $version . '.json')) {
        echo file_get_contents('../' . API_MENU_DIR . $version . '.json');
    } else {
        $docsMenus = createSideBar('../' . API_DOC_DIR . $version . "/*", API_DOC_DIR, 1, 'md');
        $apiMenus = createSideBar('../' . API_APIS_DOC_DIR . $version . "/*", API_APIS_DOC_DIR, 1, 'json');
        $sideBarMenus = array();
        if (isset($docsMenus)) {
            foreach ($docsMenus as $docKey => $docValue) {
                foreach ($docValue as $docVal) {
                    $sideBarMenus[trim($docKey)][] = $docVal;
                }
            }
        }
        if (isset($apiMenus)) {
            foreach ($apiMenus as $apiKey => $apiValue) {
                foreach ($apiValue as $apiVal) {
                    $sideBarMenus[trim($apiKey)][] = $apiVal;
                }
            }
        }
        $output = json_encode($sideBarMenus);
        //error_log($output,'3','hsdjkfhsk.json');
        echo $output;
    }
}
