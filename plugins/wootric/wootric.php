<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_filter('docs_footer_script', 'loginradiusV2Js', 10, 0);
$hooks->add_filter('docs_footer_script', 'wootricImplementation', 11, 0);

function loginradiusV2Js() {
    docs_enqueue_script("https://auth.lrcontent.com/v2/js/LoginRadiusV2.js");
}

function wootricImplementation() {
    ?>
    <script type="text/javascript">
        var date = +new Date();
        var seconds = Math.floor(date / 1000);
        window.wootricSettings = {};

        window.wootricSettings.created_at = seconds;
        window.wootricSettings.account_token = 'NPS-571d788a';
        var options = {};
        options.apiKey = "<?php echo LR_APPKEY;?>";
        options.appName = "<?php echo LR_APPNAME;?>";

        $LR = new LoginRadiusV2(options);

        var ssologin_options = {};
        var handleResponse = function (token) {

            $LR.api.socialLogin({token: token},
                    function (response) {

                        var accountType = "Darwin";
                        if(response.Profile.CustomFields){

                            if(response.Profile.CustomFields.planType){
                                accountType = response.Profile.CustomFields.planType;

                            }

                        }
                        if ( accountType == "enterprise") {

                            if (response.Profile.Email && response.Profile.Email[0].Value) {
                                window.wootricSettings.email = response.Profile.Email[0].Value;
                            }
                            if (response.Profile.Uid) {
                                window.wootricSettings.external_id = response.Profile.Uid;
                            }

                            var script = document.createElement('script');
                            script.src = "https://cdn.wootric.com/wootric-sdk.js";
                            script.onload = function () {
                                window.wootric('run');
                            };
                            document.head.appendChild(script);
                        }
                    }, function (errors) {
                        // don't load wootric
            }, 'userprofile');

        };
        ssologin_options.onError = function (token) {
            if (token) {
                handleResponse(token);
            }
        };
        ssologin_options.onSuccess = function (token) {
            handleResponse(token);

        };
        $LR.init("ssoNotLoginThenLogout", ssologin_options);
    </script>

    <?php

}
