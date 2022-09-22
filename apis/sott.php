<?php

require_once '../config.php';
require_once CLASSES_DIR . 'loader.php';
require_once CLASSES_DIR . 'SOTT.php';

$apikey = isset($_REQUEST['apikey']) && !empty($_REQUEST['apikey']) ? trim($_REQUEST['apikey']) : '';
$secret = isset($_REQUEST['secret']) && !empty($_REQUEST['secret']) ? trim($_REQUEST['secret']) : '';
$output = array();

$output['status'] = 'error';
if (!empty($apikey) && !empty($secret)) {
    $sott = new SOTT($apikey, $secret);
    $output['response'] = $sott->encrypt();
    $output['status'] = 'success';
} else {
    $output['response'] = 'API and Secret key are required fields.';
}

echo json_encode($output);

