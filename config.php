<?php
$protocal = isset($_SERVER['REQUEST_SCHEME']) && !empty($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';
$domain = isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$path = isset($_SERVER['SCRIPT_NAME']) && !empty($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
$searchandreplace = array(
    //'lr-apidocs-dev.azurewebsites.net'=>'www2.loginradius.org/docs',
    //'lr-apidocs.azurewebsites.net'=>'www.loginradius.com/docs'
    'lr-apidocs.azurewebsites.net'=>'apidocs-env.eba-9v4ff33r.us-east-1.elasticbeanstalk.com/apidocs-dev/'
);
$domain = str_replace(array_keys($searchandreplace), array_values($searchandreplace), $domain);
//$domain = 'docs.loginradius.org/docs';
$proxyDomainParse = parse_url($protocal . '://' . $domain);
$rootURL = rtrim($protocal . '://' . $domain . $path, 'index.php'); //SG gets rid of index in root path

$proxyDomainParse['path'] = isset($proxyDomainParse['path'])?$proxyDomainParse['path']:'';
define('ROOT_URL', $rootURL);
define('Proxy_Domain_Path',$proxyDomainParse['path']);
/* DATABASE */
define('DATABASE', 'database');

/* API DOCS DATABASE */
//SG sets constants; reuses set constants shortly after
define('API_DOCS_DATABASE', DATABASE . '/apidocs/');
define('API_DOC_DIR', API_DOCS_DATABASE . 'docs/');
define('API_DOC_CONFIG_DIR', API_DOCS_DATABASE . 'docsconfig/');
define('API_COMMON_DOC_DIR', API_DOC_DIR . 'general/');
define('API_APIS_DOC_DIR', API_DOCS_DATABASE . 'apis/');
define('API_APIS_CONFIG_DIR', API_DOCS_DATABASE . 'apiconfig/');
define('API_COMMON_APIS_DIR', API_APIS_DOC_DIR . 'general/');
define('API_MENU_DIR', API_DOCS_DATABASE . 'menus/');
define('API_CHANGELOG_DIR', API_DOCS_DATABASE . 'changelog/');

/* SUPPORT DOCS DATABASE */
define('SUPPORT_DOCS_DATABASE', DATABASE . '/supportdocs/');
define('SUPPORT_DOCS_MENU_DIR', SUPPORT_DOCS_DATABASE . 'menus/');
define('SUPPORT_DOCS_DOCS_DIR', SUPPORT_DOCS_DATABASE . 'docs/');
define('SUPPORT_DOCS_CONFIG_DIR', SUPPORT_DOCS_DATABASE . 'config/');

/* DIRECTORY PATH */

$scriptName = trim(str_replace("\\","/", dirname($_SERVER['SCRIPT_NAME'])),'/');
$rootDir = explode('/', $scriptName);
$rootPath = '/';
if(isset($rootDir[0]) && !empty($rootDir[0])){
    $rootPath .= $rootDir[0].'/';
}
define('ROOT_PATH', $rootPath);

define('THEME_DIR', __DIR__ . '/theme/apidocs/');
define('THEME_URL', ROOT_URL . 'theme/apidocs/');
define('PLUGIN_DIR', __DIR__ . '/plugins/');
define('PLUGIN_URL', ROOT_URL . 'plugins/');
define('APIS_DIR', __DIR__ . '/apis/');
define('APIS_URL', ROOT_URL . 'apis/');
define('CLASSES_DIR', __DIR__ . '/classes/');
define('VENDOR_DIR', __DIR__ . '/vendor/');


/* API DOC BASIC CONFIG */
define('API_DOCS', 'api');
define('API_DOCS_URL', ROOT_URL . API_DOCS);
define('API_CHANGELOG_DOCS', 'changelog');
define('API_CHANGELOG_FEED', 'changelog/feed');
define('API_CHANGELOG_URL', API_DOCS_URL . '/' . API_CHANGELOG_DOCS);
define('COMMON_DOCS', true);

define('SUPPORT_DOCS', '');
define('SUPPORT_DOCS_URL', ROOT_URL . SUPPORT_DOCS);

/* AZURE IMAGE SERVER CONFIG */
define('AZURE_CONTAINER', 'images');
define('AZURE_PROTOCOL', 'https');
define('AZURE_ACCOUNT_DOMAIN', $_SERVER['AZURE_ACCOUNT_DOMAIN']);
define('AZURE_ACCOUNT_NAME', $_SERVER['AZURE_ACCOUNT_NAME'] );
define('AZURE_ACCOUNT_KEY', $_SERVER['AZURE_ACCOUNT_KEY']);
define('IMAGE_FILE_FORMAT', 'png,jpg,gif');



/*Google Recaptcha Config*/
define('RECAPTCHA_SECRET', $_SERVER['RECAPTCHA_SECRET']);
define('RECAPTCHA_SITE_KEY',$_SERVER['RECAPTCHA_SITE_KEY']);

/* DEBUGING */
define('DEBUG', false);

define('PROTOCAL_USERNAME',  $_SERVER['PROTOCAL_USERNAME']);
define('PROTOCAL_PASSWORD',  $_SERVER['PROTOCAL_PASSWORD']);

define('LR_SESSION_NAME',$_SERVER['LR_SESSION_NAME']);
define('LR_APPKEY', $_SERVER['LR_APPKEY']);
define('LR_APPNAME', $_SERVER['LR_APPNAME']);
header('Cache-Control: no cache'); //disable validation of form by the browser

ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
