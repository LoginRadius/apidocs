<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$document = DOCUMENT_PATH;
if(!empty($document)){
    if(substr($document, -1) == '/'){
        $document = trim($document,'/');
    }else{
        header("Location: ".ROOT_URL.$document.'/', true, 301);
    }
}
$is_version = $is_apiPage = $is_documentPage = $is_changelog = $is_supportPage = false;
$is_404 = true;

//API DOCS
$redirections = array("oldredirections","reference","apidocs", "home", "sitemap", "supportdocs","auth");
foreach ($redirections as $redirection) {
    require_once PLUGIN_DIR . 'routing/routes/' . $redirection . '.php';
}
$is_404 = $hooks->apply_filters('docs_template_status', $is_404, $document);
if ($is_404) {
    header("HTTP/1.0 404 Not Found");
    require_once THEME_DIR . $hooks->apply_filters('docs_template', '404') . '.php';
}    

