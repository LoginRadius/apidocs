<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_action('docs_template', 'protactedTemplate');

function protactedTemplate($page) {
    //if ((strpos(ROOT_URL, 'docs.loginradius.com') === false)||(strpos(ROOT_URL, 'lr-apidocs.azurewebsites.net') === false)) {
    $rurl = parse_url(ROOT_URL);
    $tempHost = isset($rurl['host']) ? $rurl['host'] : '';
    $whiteListDomains = array('www.loginradius.com','docs.loginradius.com','docs.loginradius.org', 'lr-apidocs.azurewebsites.net','apidocs.loginradius.com','support.loginradius.com');
    if (!empty($tempHost)) {
        if (!in_array($tempHost, $whiteListDomains)) {
            if (!isset($_COOKIE['protactedUserName']) || !isset($_COOKIE['protactedPassword']) || ($_COOKIE['protactedUserName'] != PROTOCAL_USERNAME) || ($_COOKIE['protactedPassword'] != PROTOCAL_PASSWORD)) {
                return '../../plugins/dev-stag-protect/template/protact';
            }
        }
    }
    return $page;
}
