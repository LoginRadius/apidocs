<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}

if (!class_exists('authantication')) {

    class authantication {

        function __construct() {
            $this->session_init();
             /* bypass login if token exist */
            $accesscoderesponse = json_decode(file_get_contents(DATABASE . "/accesscode.json"));//fetching the accesstoken from json file.
            $accesscode = array();
            foreach($accesscoderesponse as $accode){
                $accesscode[]= $accode->accesstoken;
            }
            if ((isset($_GET['accesscode']) && in_array($_GET['accesscode'], $accesscode)) || (in_array($this->getSession('accesscode'), $accesscode))) {
                if (isset($_GET['accesscode'])) {
                    $this->setSession('accesscode', $_GET['accesscode']);
                }
                return;
            }
            /* end */
            $document = isset($_REQUEST['document']) ? trim($_REQUEST['document']) : '';
            $allowlogin = isset($_REQUEST['allowlogin']) ? trim($_REQUEST['allowlogin']) : '';
            $this->allowAutoLogin = false;
            if (!empty($document)) {
                if ( ($allowlogin != '1') && !$this->getSession('token') && empty($this->getSession('token'))) {
           //         $this->allowAutoLogin = true;
                } elseif ($allowlogin == '1') {
                    $this->allowAutoLogin = false;
                }
            }
            global $hooks;
            $hooks->add_filter('init', array($this, 'authanticationImplementation'), 11, 0);
            $hooks->add_filter('docs_head_script', array($this, 'lrV2JsScript'), 10, 0);
            $hooks->add_filter('docs_login_url', array($this, 'docsLoginURL'), 10, 1);
            $hooks->add_filter('docs_logout_url', array($this, 'docsLogoutURL'), 10, 1);
        }

        function session_init() {
            if(!isset($_SESSION)) { 
                session_start(array(LR_SESSION_NAME));
            }
            $now = time();
            if ($this->getSession('discard_after') && $now > $this->getSession('discard_after')) {
                // this session has worn out its welcome; kill it and start a brand new one
                session_unset();
                session_destroy();
                session_start(array(LR_SESSION_NAME));
            }

            // either new or old, it should live at most for another hour
            $this->setSession('discard_after', $now + 3600);
        }

        function lrV2JsScript() {
            global $hooks;
            docs_enqueue_script("//auth.lrcontent.com/v2/js/LoginRadiusV2.js");
            ?>
            <script>
                var selfLogout = function () {
                    var form = document.createElement('form');
                    form.action = window.location.href;
                    form.method = 'POST';
                    var hiddenToken = document.createElement('input');
                    hiddenToken.type = 'hidden';
                    hiddenToken.value = '1';
                    hiddenToken.name = 'logout';
                    form.appendChild(hiddenToken);
                    document.body.appendChild(form);
                    form.submit();
                };
                jQuery(document).ready(function () {
                    var options = {};
                    options.apiKey = "<?php echo LR_APPKEY; ?>";
                    options.appName = "<?php echo LR_APPNAME; ?>";
                    options.appPath = "<?php echo ROOT_URL; ?>";
                    $LR = new LoginRadiusV2(options);

                    var ssologin_options = {};
                    var tokenResponse = function (token) {
            <?php if (empty($this->getSession('token'))) { ?>
                           /* var form = document.createElement('form');
                            form.action = window.location.href;
                            form.method = 'POST';
                            var hiddenToken = document.createElement('input');
                            hiddenToken.type = 'hidden';
                            hiddenToken.value = token;
                            hiddenToken.name = 'token';
                            form.appendChild(hiddenToken);
                            document.body.appendChild(form);
                            form.submit();*/
                            $.ajax({
                                url: window.location.href,
                                type: 'POST',
                                data: {
                                    'token': token,
                                },
                                success: function(msg) {
                                    console.log("success")
                                    $LR.api.socialLogin({
                                            'token': token
                                        },
                                        function(response) {
                                            if (response.Profile.Uid) {
                                                let displayName = response.Profile.Uid;
                                                if (response.Profile.FullName) {
                                                    displayName = response.Profile.FullName;
                                                } else if (response.Profile.Email[0].Value) {

                                                    displayName = response.Profile.Email[0].Value.replace(/@.*/, "");

                                                }
                                                jQuery('#authantication').attr('href', '#');
                                                var myaccount = "<div class='authantication-myaccount'>";
                                                myaccount += "<ul>";
                                                myaccount += "<li>";
                                                myaccount += "<a href='<?php echo $hooks->apply_filters('docs_profile_url', 'https://adminconsole.loginradius.com/'); ?>' target='_blank'>My Account</a>";
                                                myaccount += "</li>";
                                                myaccount += "<li>";
                                                myaccount += "<a href='#' onclick='selfLogout()'>Logout</a>";
                                                myaccount += "</li>";
                                                myaccount += "</ul>";
                                                myaccount += "</div>";
                                                jQuery('#authantication').html(displayName + myaccount);
                                                // send the logged in user email to amplitude
                                                amplitude_email_address = response.Profile.Email[0].Value;
                                                LRUserProfileforIntercom = response;
                                                PlanType = "Darwin";
                                                if (response.Profile.CustomFields) {
                                                    if (response.Profile.CustomFields.planType) {
                                                        var accountType = response.Profile.CustomFields.planType;
                                                        switch (accountType) {
                                                            case "enterprise":
                                                                PlanType = "Enterprise";
                                                                break;

                                                            default:
                                                                PlanType = "Darwin";
                                                        }

                                                    }
                                                }
                                            }

                                        },
                                        function(errors) {
                                            //selfLogout();
                                            console.log("Error occured please try again")
                                        }, 'userprofile');
                                }
                            });
            <?php } else { ?>
                            $LR.api.socialLogin({token:"<?php echo $this->getSession('token'); ?>"},
                             function (response) {
                                if (response.Profile.Uid) {
                                    let displayName = response.Profile.Uid;
                                    if (response.Profile.FullName) {
                                        displayName = response.Profile.FullName;
                                    }
                                    else if (response.Profile.Email[0].Value){

                                        displayName = response.Profile.Email[0].Value.replace(/@.*/,""); 

                                    } 
                                        jQuery('#authantication').attr('href', '#');
                                        var myaccount = "<div class='authantication-myaccount'>";
                                        myaccount += "<ul>";
                                        myaccount += "<li>";
                                        myaccount += "<a href='<?php echo $hooks->apply_filters('docs_profile_url', 'https://adminconsole.loginradius.com/'); ?>' target='_blank'>My Account</a>";
                                        myaccount += "</li>";
                                        myaccount += "<li>";
                                        myaccount += "<a href='#' onclick='selfLogout()'>Logout</a>";
                                        myaccount += "</li>";
                                        myaccount += "</ul>";
                                        myaccount += "</div>";
                                        jQuery('#authantication').html(displayName + myaccount);
                                    // send the logged in user email to amplitude
                                    amplitude_email_address =response.Profile.Email[0].Value;
                                    LRUserProfileforIntercom = response;
                                    PlanType = "Darwin";
                                    if(response.Profile.CustomFields){
                                        if(response.Profile.CustomFields.planType){
                                        var accountType = response.Profile.CustomFields.planType;
                                        switch (accountType) {
                                        case "enterprise":
                                            PlanType = "Enterprise";
                                            break;
                
                                        default:
                                            PlanType = "Darwin";
                                        }

                                        }
                                }
                            }

                            }, function (errors) {
                                selfLogout();
                            }, 'userprofile');
            <?php } ?>
                    };
                    ssologin_options.onError = function (token) {
                        if (token) {
                            tokenResponse(token);
                        } else {
                            /*call logout*/
            <?php if ($this->allowAutoLogin == true) { ?>
      //                          window.location.href = '<?php echo $this->docsLoginURL("https://accounts.loginradius.com/auth.aspx?action=login"); ?>';
            <?php } ?>
                        }
                    };
                    ssologin_options.onSuccess = function (token) {
                        tokenResponse(token);
                    };
                    $LR.init("ssoNotLoginThenLogout", ssologin_options);
                });
            </script><?php
        }

        function authanticationImplementation() {
            if (isset($_REQUEST['token']) && !empty($_REQUEST['token'])) {
                $this->setSession('token', $_REQUEST['token']);
                $userAPI = new LoginRadiusSDK\CustomerRegistration\Authentication\UserAPI(LR_APPKEY, LR_APPKEY, array('output_format' => 'json'));
                $this->setSession('profile', $userAPI->getProfile($this->getSession('token')));

            } elseif (isset($_REQUEST['logout']) && ($_REQUEST['logout'] == '1')) {
                session_unset();
                session_destroy();
                header('Location: ' . $this->docsSSOLogoutURL("https://accounts.loginradius.com/auth.aspx?action=logout"),TRUE,301);
                exit();
            } elseif ($this->allowAutoLogin == true) {
                header('Location: ' . $this->docsLoginURL("https://accounts.loginradius.com/auth.aspx?action=login"),TRUE,301);
                exit();
            }
        }

        function getSession($key) {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
        }

        function setSession($key, $value) {
            $_SESSION[$key] = $value;
        }

        function docsLoginURL($url) {
            $enableQueryString = '?';
            if(strpos($url, '?') !== false){
                $enableQueryString = '&';
            }
            $document = isset($_GET['document']) ? $_GET['document'] : '';
            return $url . $enableQueryString . 'return_url=' . urlencode(ROOT_URL . $document . '?allowlogin=1');
        }

        function docsLogoutURL($url) {
            return "#' onclick='selfLogout()'";
        }

        function docsSSOLogoutURL($url) {
            $enableQueryString = '?';
            if(strpos($url, '?') !== false){
                $enableQueryString = '&';
            }
            $document = isset($_GET['document']) ? $_GET['document'] : '';
            // selfLogout();
            return $url . $enableQueryString. 'return_url=' . urlencode(ROOT_URL . $document);
        }

    }

    new authantication();
}
