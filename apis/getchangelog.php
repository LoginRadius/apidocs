<?php

require_once '../config.php';
require_once CLASSES_DIR . 'loader.php';
$document = isset($_GET['document']) ? $_GET['document'] : '';
$document = substr($document,strlen(Proxy_Domain_Path));
$format = isset($_GET['format']) ? $_GET['format'] : '';
$output['status'] = 'error';
$docDir = API_CHANGELOG_DIR;

$temp = parse_url($document);
$document = isset($temp['path']) ? $temp['path'] : '';
if (ROOT_PATH != '/') {
    $document = substr($document, strlen(ROOT_PATH), strlen($document));
}
$document = trim($document, '/');
$docTemp = explode('/', $document);
if($docTemp[0] == 'docs'){
    unset($docTemp[0]);
    $document = implode('/', $docTemp);
}
if (substr($document, 0, strlen(API_DOCS)) == API_DOCS) {
    $document = substr($document, strlen(API_DOCS), strlen($document));
    $document = trim($document, '/');
}
if (substr($document, 0, strlen(API_CHANGELOG_DOCS)) == API_CHANGELOG_DOCS) {
    $document = substr($document, strlen(API_CHANGELOG_DOCS), strlen($document));
    $document = trim($document, '/');
}
if (file_exists('../' . API_CHANGELOG_DIR . $document . '.' . $format)) {
    $output['status'] = 'success';
    $output['data'] = file_get_contents('../' . API_CHANGELOG_DIR . $document . '.' . $format);
    if ($format == 'json') {
        $output['data'] = json_decode($output['data']);
        $output['data']->created_date = getTime($output['data']->created_date);
    }
}
echo json_encode($output);
