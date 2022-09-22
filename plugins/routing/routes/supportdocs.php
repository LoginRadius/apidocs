<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if (file_exists(SUPPORT_DOCS_DOCS_DIR . $document . '.md')) {
        $is_404 = false;
        $is_supportPage = true;

        $sidebarMenu = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
        $supportContent = file_get_contents(SUPPORT_DOCS_DOCS_DIR . $document . '.md');

        $subsectionnames = array("authentication" => "Authentication","single-sign-on" =>"Single Sign On","customer-management" => "Customer Management","security"=> "Security","governance"=> "Governance","customer-intelligence"=> "Customer Intelligence","integrations"=> "Integrations","libraries"=>"Libraries","referencedocs/api"=> "Reference Docs/APIs");
      
            
        foreach($subsectionnames as $key => $value){
        if (strpos($document, $key) !== false) {
            
        $menu = $value;
        
        break;
        } else {
            $menu = '';
        }
        }
        require_once THEME_DIR . $hooks->apply_filters('docs_template', 'support-document') . '.php';
    }
}