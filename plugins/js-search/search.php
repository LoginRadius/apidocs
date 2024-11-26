<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
define('quicklinks', file_get_contents(PLUGIN_DIR .'/js-search/quickMenuLinks.json'));
define('documentationMenuLinks', file_get_contents(PLUGIN_DIR .'/js-search/documentationMenuLinks.json'));
define('iconMenuLinks',file_get_contents(PLUGIN_DIR .'/js-search/iconMenuLinks.json'));

global $hooks;

$hooks->add_action('docs_footer_script', 'lrHelpSearchScript', 10, 0);
$hooks->add_action('docs_head_script', 'lrHelpSearchHeadScript', 10, 0);

function lrHelpSearchHeadScript() {
    $authantication = new authantication();
    if(!$authantication->getSession('token')){
        return;
    }

?>
    <script type="text/javascript">
        var sh_support=
        {
            Script:{
                Host:'<?php echo PLUGIN_URL . "js-search/";?>',
                Prefix:'sh_',
                Version:'2.1'
            },
            Files:{
                QuickLink: <?php echo quicklinks?>,
                DocumentationList: <?php echo documentationMenuLinks ?>,
                IconLinks: <?php echo iconMenuLinks ?>
            },
            Animation:{Start:0,End:1,Speed:0.05},
            Time:{
                Interval:10,
                Loopoff:100
            }
    };
    </script>
    <?php
    }
function lrHelpSearchScript() {
    $authantication = new authantication();
    if(!$authantication->getSession('token')){
        return;
    }
    docs_enqueue_script(PLUGIN_URL . "js-search/assets/js/script.js");
?>
    <script type="text/javascript">
        var LoginRadiusV2Interval = setInterval(function () {
            if (typeof (LoginRadiusV2) != "undefined") {
                clearInterval(LoginRadiusV2Interval);
                var commonOptions = {};
                commonOptions.apiKey = '<?php echo LR_APPKEY; ?>';
                commonOptions.appName = '<?php echo LR_APPNAME; ?>';
                LRObject = new LoginRadiusV2(commonOptions);
                var is_docsearch = setInterval(function () {
                    if (typeof sh_init != 'undefined') {
                        clearInterval(is_docsearch);
                        var sh_commonOptions = {
                            templateId: 'jssearchintercominterface',
                            algoliaSetting: {
                                apiKey:"<?php echo ALGOLIA_API_KEY; ?>",
                                appId: "<?php echo ALGOLIA_APP_ID;?>",
                                indexName: 'loginradius',
                                inputSelector: '#algoliasearchhelp',
                                autocompleteOptions: {
                                    autoselect: false
                                }
                            },
                            intercomSetting: {
                                App_Id: "<?php echo INTERCOM_APP_ID;?>"
                                hide:'false'
                                
                            },
                            supportSetting: {
                                Url: 'https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket',
                                Target: '_blank',
                                hide: 'false'
                            },
                            googleSetting: {
                                eventName: "SearchedText"
                            }
                        };

                        var is_docSearchProfileCount = 0;
                        var is_docSearchProfile = setInterval(function () {
                            is_docSearchProfileCount++;
                        if(typeof LRUserProfileforIntercom != 'undefined'){
                            clearInterval(is_docSearchProfile);                     
                            switch (PlanType) {
                                    case "Enterprise":
                                        sh_commonOptions.intercomSetting.hide = false;
                                        sh_commonOptions.supportSetting.hide = false;
                                        sh_commonOptions.intercomSetting.profile = mapLoginRadiusFieldsWithIntercom();
                                        break;
                                    default:
                                        sh_commonOptions.intercomSetting.hide = true;   
                                        sh_commonOptions.supportSetting.hide = true;
                                    }
                            sh_init(sh_commonOptions);
                                    
                        } else if (is_docSearchProfileCount>1000){
                            clearInterval(is_docSearchProfile);
                            sh_init(sh_commonOptions);
                        }
                    }, 10);
                    }
                }, 1);
            }
        }, 1);
        function mapLoginRadiusFieldsWithIntercom(){
            <?php $profile = $authantication->getSession('profile'); ?>
            return {
                name: "<?php echo (isset($profile->FullName) && !empty($profile->FullName)?$profile->FullName:'');?>",
                email: "<?php echo (isset($profile->Email[0]->Value) && !empty($profile->Email[0]->Value)?$profile->Email[0]->Value:'');?>",
                user_id: "<?php echo (isset($profile->Uid) && !empty($profile->Uid)?$profile->Uid:'');?>",
                user_hash:"<?php echo bin2hex(hash_hmac('sha256', (isset($profile->Uid) && !empty($profile->Uid)?$profile->Uid:''), 'EydN_y2b6nJhDGjoLMtZmBhbFBrBIea82Z_KGaxX', true));?>"
            };
        }
    </script>
     <div id="jssearchintercominterface"></div> 
    
    <?php
}
