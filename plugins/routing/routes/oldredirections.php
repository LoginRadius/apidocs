<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($is_404) {
    if ((substr($document, 0, strlen(API_DOCS . '/v1.0')) == API_DOCS . '/v1.0')){
        $string = API_DOCS . '/v1' . substr($document, strlen(API_DOCS . '/v1' . '.0'), strlen($document));
            $document = preg_replace('/([A-Z])/', '-$1', $string);
            $document = str_replace('/-', '/', $document);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /" . strtolower($document));
      die;
    }
            if(substr($document, 0, strlen(API_DOCS . '/v2.0')) == API_DOCS . '/v2.0') {
        $string = API_DOCS . '/v2' . substr($document, strlen(API_DOCS . '/v2' . '.0'), strlen($document));
            $document = preg_replace('/([A-Z])/', '-$1', $string);
            $document = str_replace('/-', '/', $document);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /" . strtolower($document));
      die;
        
    }
    if (file_exists(PLUGIN_DIR . 'routing/redirections/urls.json')) {
        $redirectURLS = json_decode(file_get_contents(PLUGIN_DIR . 'routing/redirections/urls.json'));
        if (is_array($redirectURLS) && count($redirectURLS) > 0) {
            foreach ($redirectURLS as $redirectURL) {
                if (isset($redirectURL->oldLink) && ($redirectURL->oldLink == $document)) {
                    $is_404 = false;
                    $parse = parse_url($redirectURL->newLink);
                    $newRedirectURL = ROOT_URL . $redirectURL->newLink;
                    if (isset($parse['host']) && !empty($parse['host'])) {
                        $newRedirectURL = $redirectURL->newLink;
                    }
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . strtolower($newRedirectURL));
                    die;
                }
            }
        }
    }
}
