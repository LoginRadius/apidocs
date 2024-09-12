<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_filter('support_page_meta', 'seoSupportPageMETA', 10, 2);
$hooks->add_filter('apidocs_page_meta', 'seoAPIDocsPageMETA', 10, 2);
$hooks->add_action('docs_template_status', 'robotsTemplateStatus', 10, 2);
function seoAPIDocsPageMETA($currentPage, $sidebarMenu) {
    $title = '';
    $is_break = false;
    if (is_array($sidebarMenu)) {
        if (substr($currentPage, 0, strlen(API_CHANGELOG_DOCS)) == API_CHANGELOG_DOCS) {
            foreach ($sidebarMenu as $ke => $va) {
                if (isset($va["url"]) && $va["url"] == $currentPage) {
                    $title = isset($va['meta_title']) ? $va['meta_title'] : '';
                    $description = isset($va['meta_description']) ? $va['meta_description'] : '';
                    $is_break = true;
                    break;
                }
            }
        } else {
            foreach ($sidebarMenu as $key => $menus) {
                if ($is_break) {
                    break;
                }
                foreach ($menus as $k => $menu) {
                    if ($is_break) {
                        break;
                    }
                    foreach ($menu as $ke => $va) {
                        if (isset($va["url"]) && $va["url"] == $currentPage) {
                            $title = isset($va['meta_title']) ? $va['meta_title'] : '';
                            $description = isset($va['meta_description']) ? $va['meta_description'] : '';
                            $is_break = true;
                            break;
                        }
                    }
                }
            }
        }
    }
       if (!$is_break) {
        $tempTitle = explode('/', $currentPage);
        $urlDescription = '';
        $seoTitle = '';
        foreach ($tempTitle as $key => $urlTitle) {
            $urlDescription .= ucwords(str_replace('-', ' ', $urlTitle)) . ' - ';
            if ($urlTitle != "v2"||$urlTitle == "v1") {
                if ($key == count($tempTitle) - 1 || $key == count($tempTitle) - 2 ||$key == count($tempTitle) - 3) {
                    $seoTitle .= ucwords(str_replace('-', ' ', $urlTitle)) . ' - ';
                }

            }
        }
        $metaDescription = substr($urlDescription, 0, -2);
    
        $title = substr($seoTitle, 0, -2);
        // if ($sidebarMenu && isset($tempTitle[0]) && $tempTitle[0] != "") {
        //     $title = ucwords(str_replace('-', ' ', $tempTitle[count($tempTitle) - 1]));
        //     if (isset($tempTitle[count($tempTitle) - 2]) && is_numeric($tempTitle[count($tempTitle) - 2])) {
        //         $title .= ', ' . str_replace('-', ' ', $tempTitle[count($tempTitle) - 2]);
        //     }
        // }
    }
   
  // Check if the title is empty or just whitespace
if (empty($title) || trim($title) === "") {
    $title = 'API Documentation';
} 
// Check if the title contains HTML or JavaScript code
elseif ($title !== htmlspecialchars($title, ENT_QUOTES | ENT_HTML5)) {
    // If HTML tags or unsafe characters are detected, set title to 'Page Not Found'
    $title = 'Page Not Found';
}



    $html = "<title>" . $title . " | LoginRadius</title>";
    
    if (!empty($description)) {
        $html .= '<meta name="description" content="' . $description . '">';
    }else {
        $html .= '<meta name="description" content="For immediate assistance, LoginRadius provides developer-friendly support docs | ' . $metaDescription . '">';
    }
    
    return $html;
}

function seoSupportPageMETA($currentPage, $sidebarMenu) {
    $title = '';
    $is_break = false;
    if (is_array($sidebarMenu)) {
        foreach ($sidebarMenu as $key => $menus) {
            if ($is_break) {
                break;
            }
            foreach ($menus as $k => $menu) {
                if ($is_break) {
                    break;
                }
                foreach ($menu as $ke => $va) {
                    if (isset($va["url"]) && $va["url"] == $currentPage) {
                        $title = isset($va['meta_title']) ? $va['meta_title'] : '';
                        $description = isset($va['meta_description']) ? $va['meta_description'] : '';
                        $is_break = true;
                        break;
                    }
                }
            }
        }
    }
    if (!$is_break) {
        $tempTitle = explode('/', $currentPage);
        if ($sidebarMenu && isset($tempTitle[0]) && $tempTitle[0] != "") {
            $title = ucwords(str_replace('-', ' ', $tempTitle[count($tempTitle) - 1]));
        }
    }

    if (empty($title)) {
        $title = 'Resource Portal';
    }
    $html = "<title>" . $title . " | LoginRadius Identity Platform</title>";
    if (!empty($description)) {
        $html .= '<meta name="description" content="' . $description . '">';
    }
    return $html;
}

function robotsTemplateStatus($is_404,$document) {
    global $hooks;
    if ($is_404) {
        if (!empty($document) && ($document == 'robots.txt')) {
            require_once THEME_DIR . $hooks->apply_filters('docs_template', '../../plugins/seo/template/robots') . '.php';
            return false;
        }
    }
    return $is_404;
}
