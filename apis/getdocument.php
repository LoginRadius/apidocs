<?php

require_once '../config.php';
require_once CLASSES_DIR . 'loader.php';
$document = DOCUMENT_PATH;
$document = substr($document,strlen(Proxy_Domain_Path));

$md_tag_file = json_decode(fetchUrlWithRetries('../database/supportdocs/menus/tag_name.json'), true);
$protactedDocument = isset($_COOKIE['protactedDocument']) ? trim($_COOKIE['protactedDocument']) : '';
$output['status'] = 'error';
$output['isAuth'] = false;
if (ROOT_PATH != '/') {
    $document = str_replace(ROOT_PATH, '', $document);
}
$document = trim($document, '/');
$docTemp = explode('/', $document);
if($docTemp[0] == 'docs'){
    unset($docTemp[0]);
    $document = implode('/', $docTemp);
}
//var_dump($document);
if (substr($document, 0, strlen(API_DOCS)) == API_DOCS) {
    $document = trim(substr($document, strlen(API_DOCS), strlen($document)), '/');
    if (COMMON_DOCS && file_exists('../' . str_replace(array('v1/', 'v2/'), API_COMMON_DOC_DIR, $document) . '.md')) {
        $output['status'] = 'success';
//        $documents['doc'] = str_replace(array('v1/', 'v2/'), API_COMMON_DOC_DIR, $document);
//        $documents['config'] = str_replace(array('v1/', 'v2/'), API_DOC_CONFIG_DIR, $document);
        $documents['isComman'] = true;
        $documents['docPath'] = API_COMMON_DOC_DIR;
        $documents['doc'] = $document;
        $documents['configPath'] = API_DOC_CONFIG_DIR;
        $output['format'] = 'md';
        $output = protectedDocument($documents, $output, $protactedDocument);
    } elseif (COMMON_DOCS && file_exists('../' . str_replace(array('v1/', 'v2/'), API_COMMON_APIS_DIR, $document) . '.json')) {
        $output['status'] = 'success';
//        $documents['doc'] = str_replace(array('v1/', 'v2/'), API_COMMON_APIS_DIR, $document);
//        $documents['config'] = str_replace(array('v1/', 'v2/'), API_APIS_CONFIG_DIR, $document);
        $documents['isComman'] = true;
        $documents['docPath'] = API_COMMON_APIS_DIR;
        $documents['doc'] = $document;
        $documents['configPath'] = API_APIS_CONFIG_DIR;
        $output['format'] = 'json';
        $output = protectedDocument($documents, $output, $protactedDocument);
    } elseif (file_exists('../' . API_DOC_DIR . $document . '.md')) {
        $output['status'] = 'success';
        $documents['isComman'] = false;
        $documents['docPath'] = API_DOC_DIR;
        $documents['doc'] = $document;
        $documents['configPath'] = API_DOC_CONFIG_DIR;
        $output['format'] = 'md';
        $output = protectedDocument($documents, $output, $protactedDocument);
     
    } elseif (file_exists('../' . API_APIS_DOC_DIR . $document . '.json')) {
        $output['status'] = 'success';
        $documents['isComman'] = false;
        $documents['docPath'] = API_APIS_DOC_DIR;
        $documents['doc'] = $document;
        $documents['configPath'] = API_APIS_CONFIG_DIR;
        $output['format'] = 'json';
        $output = protectedDocument($documents, $output, $protactedDocument);
    }
} else {
    $documents['isComman'] = false;
    $documents['docPath'] = SUPPORT_DOCS_DOCS_DIR;
    $documents['doc'] = $document;
    $documents['configPath'] = SUPPORT_DOCS_CONFIG_DIR;
    if (file_exists('../' . $documents['docPath'] . $documents['doc'] . '.md')) {
        $output['format'] = 'md';
        $output = protectedDocument($documents, $output, $protactedDocument);
    }
}



$check_tag = $output['data'];

if(!isArrayNullOrEmpty($md_tag_file)){
foreach ($md_tag_file as $name => $md_tag_name){

if(strpos($check_tag,$md_tag_name['md_tag_name'] )){

$md_tag_url = $md_tag_name['url'];
$output['path'] = '../'. SUPPORT_DOCS_DOCS_DIR. $md_tag_url. '.md' ; 
$output['Newdata'] = fetchUrlWithRetries('../'. SUPPORT_DOCS_DOCS_DIR. $md_tag_url. '.md');
$replace_string = str_replace($md_tag_name['md_tag_name'], $output['Newdata'], $check_tag);
$output['data'] = $replace_string;

}
}
}

echo json_encode($output);

function protectedDocument($documents, $output, $protactedDocument) {
    $documentConfigSetting = array();
    $output['status'] = 'success';
    if (file_exists('../' . $documents['configPath'] . $documents['doc'] . '.json')) {
        $documentConfigSetting = json_decode(fetchUrlWithRetries('../' . $documents['configPath'] . $documents['doc'] . '.json'),true);
        if (isset($documentConfigSetting['password']) && !empty($documentConfigSetting['password'])) {
            $output['isAuth'] = true;
            if (md5($protactedDocument) == $documentConfigSetting['password']) {
                $output['isAuth'] = false;
            }
        }
    }
    $versioning = json_decode(fetchUrlWithRetries('../' . DATABASE . "/version.json"));
    $temp = explode('/', trim($documents['doc'], '/'));
    $is_version = isset($temp[0]) && !empty($temp[0]) ? $temp[0] : '';

    if(!isArrayNullOrEmpty($versioning)){
    foreach ($versioning as $versions) {
        if ($is_version == $versions->value) {
            if (isset($versions->status) && $versions->status == 'private') {
                $output['isAuth'] = true;
                if (md5($protactedDocument) == $versions->password) {
                    $output['isAuth'] = false;
                    break;
                }
            }
        }
    }
}

    if ($output['isAuth'] === false) {
        if ($documents['isComman']) {
            $temp = explode('/', $documents['doc']);
            $replace = isset($temp[0]) && !empty($temp[0]) ? strlen($temp[0]) : '';
            if (!empty($replace)) {
                $documents['doc'] = substr($documents['doc'], $replace + 1, strlen($documents['doc']));
            }
        }
      
       // $output['data'] = file_get_contents('../' . $documents['docPath'] . $documents['doc'] . '.' . $output['format']);
       // Example usage
        $url = '../' . $documents['docPath'] . $documents['doc'] . '.' . $output['format'];
        $output['data']  = fetchUrlWithRetries($url);


}
    return $output;

}
/**
 * Fetches the contents of a URL with retry logic.
 *
 * @param string $url The URL to fetch.
 * @param int $maxRetries The maximum number of retries.
 * @param int $retryDelay The delay between retries in seconds.
 * @return string|false The contents of the URL, or false on failure.
 */

function fetchUrlWithRetries($url) {
        $response = @file_get_contents($url);
        if ($response !== false) {
            return $response;
        }
    

    // If retries are exhausted or it's a different error, return false
    return false;
}

function isArrayNullOrEmpty($array) {
    // Check if the array is null
    if (is_null($array)) {
        return true;
    }
    
    // Check if the array is empty
    if (empty($array)) {
        return true;
    }
    
    // If the array is neither null nor empty
    return false;
}
