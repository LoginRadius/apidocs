<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if (substr($document, 0, strlen(API_DOCS)) == API_DOCS) {
        $document = trim(substr($document, strlen(API_DOCS), strlen($document)), '/');
        $protactedDocument = isset($_COOKIE['protactedDocument']) ? trim($_COOKIE['protactedDocument']) : '';
        $isAuth = false;
        $versioning = json_decode(file_get_contents(DATABASE . "/version.json"));
        if (in_array($document, array('versions', 'v1', 'v2', 'partner'))) {
            $is_version = $document;
            $is_404 = false;
            require_once THEME_DIR . $hooks->apply_filters('docs_template', 'versions') . '.php';
        } elseif (COMMON_DOCS && (file_exists(str_replace(array('v1/', 'v2/', 'partner/'), API_COMMON_DOC_DIR, $document) . '.md') || (file_exists(str_replace(array('v1/', 'v2/'), API_COMMON_APIS_DIR, $document) . '.json')))) {
            $is_documentPage = true;
            $tempDocument = explode('/', trim($document, '/'));
            $is_version = isset($tempDocument[0]) ? $tempDocument[0] : 'v1';
            if (!in_array($is_version, array('v1/', 'v2/', 'partner/'))) {
                $is_version = 'v1';
            }
            $is_404 = false;
            $phpPage = 'document';
            if (file_exists(str_replace(array('v1/', 'v2/', 'partner/'), API_COMMON_APIS_DIR, $document) . '.json')) {
                $phpPage = 'apidocument';
                $is_apiPage = true;
            }
            $sideMenus = json_decode(file_get_contents(API_MENU_DIR . $is_version . '.json'), true);
            require_once THEME_DIR . $hooks->apply_filters('docs_template', $phpPage) . '.php';
        } elseif (file_exists(API_DOC_DIR . $document . '.md') || file_exists(API_APIS_DOC_DIR . $document . '.json')) {
            $is_documentPage = true;
            $is_404 = false;
            $tempDocument = explode('/', trim($document, '/'));
            $is_version = isset($tempDocument[0]) ? $tempDocument[0] : 'v1';
            $phpPage = 'document';
            if (file_exists(API_APIS_DOC_DIR . $document . '.json')) {
                $phpPage = 'apidocument';
                $is_apiPage = true;
            }
            foreach ($versioning as $versions) {
                if ($is_version == $versions->value) {
                    if (isset($versions->status) && $versions->status == 'private') {
                        $isAuth = true;
                        if (md5($protactedDocument) == $versions->password) {
                            $isAuth = false;
                            break;
                        }
                    }
                }
            }
            if ($isAuth) {
                require_once THEME_DIR . $hooks->apply_filters('docs_template', 'protacteddocument') . '.php';
            } else {
                if ($is_version == 'v1') {
                    $sideMenus = json_decode(file_get_contents(API_MENU_DIR . $is_version . '.json'), true);
                    $menu = '';
                    //added the redirection of all valid V1 api urls to v2 get-started url
                    header("Location:" . API_DOCS_URL.strtolower("/v2/getting-started/introduction/"));
                    
                }else{
  // Render Side menu as per the Top Navigation sections
  $sideMenus = json_decode(file_get_contents(API_MENU_DIR . $is_version . '.json'), true);
  $subsectionnames = array("getting-started" => "Getting Started", "admin-console" => "Admin Console", "deployment" => "Deployment", "customer-identity-api" => "Customer Identity API", "cloud-directory-api" => "Cloud Directory API", "Single Sign-On" => "single-sign-on", "integrations" => "Integrations", "troubleshooting" => "Troubleshooting", "announcements" => "Announcements");

  $menu = '';
  require_once THEME_DIR . $hooks->apply_filters('docs_template', $phpPage) . '.php';
                }
              
            }
        } elseif (empty($document)) {
            //API Home page
            $is_404 = false;
            $is_version = 'v2';
            require_once THEME_DIR . $hooks->apply_filters('docs_template', 'apihome') . '.php';
        } elseif (substr($document, 0, strlen(API_CHANGELOG_FEED)) == API_CHANGELOG_FEED) {
            //Changelog rss feed
            $phpPage = API_CHANGELOG_FEED;
            $is_404 = false;
            require_once THEME_DIR . 'feed.php';
        } elseif (substr($document, 0, strlen(API_CHANGELOG_DOCS)) == API_CHANGELOG_DOCS) { //Changelog posts
            $phpPage = API_CHANGELOG_DOCS;
            $is_404 = false;
            if (file_exists(str_replace(API_CHANGELOG_DOCS . '/', API_CHANGELOG_DIR, $document) . '.json')) {
                $is_changelog = true;
                $phpPage = 'single-' . API_CHANGELOG_DOCS;
            }
            $sideMenus = json_decode(file_get_contents(API_MENU_DIR . "posts.json"), true);
            if ($document != API_CHANGELOG_DOCS) {
                $parse = explode('/', $document);
                $year = isset($parse[1]) ? trim($parse[1]) : '';
                $month = isset($parse[2]) ? trim($parse[2]) : '';
                 // if we have any other value after the month in url, redirect to 404

                 $anythingElse = isset($parse[3]) ? trim($parse[3]) : '';
                $costomPost = array();
                foreach ($sideMenus as $key => $changelog) {
                    if (isset($changelog['date'])) {
                        if (date('Y/F', strtotime($changelog['date'])) == $year . '/' . $month) {
                            $costomPost[] = $changelog;
                        }
                    }
                }
               

                if (sizeof($costomPost) == 0 && $phpPage != 'single-' . API_CHANGELOG_DOCS) {
                    header("HTTP/1.0 404 Not Found");
                    $phpPage = '404';
                }else if($anythingElse){
                    header("HTTP/1.0 404 Not Found");
                    $phpPage = '404';
                }
            }
            require_once THEME_DIR . $hooks->apply_filters('docs_template', $phpPage) . '.php';
        } else header("Location: /404");
    }
}
