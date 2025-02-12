<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
?>
</div>
</main>


</div>
<div id="LoadingGif" class="loading-gif"></div>

<!-- If this is an API page, then insert  GET ACCESS TOKEN button SG-->
<?php if ($is_apiPage) { ?>
    <div class="popup-model-overlay">
        <div class="logininterface">
            <div class="title">
                <h2>LoginRadius Credentials</h2>
                <div class="close"></div>
            </div>

            <div id="logininterfacemessage" class="login-interface-message"></div>
            <form onsubmit="return false">
                <label for="apikey"><input id="apikey" placeholder="API Key"></label>
                <label for="secret"><input type="password" id="secret" placeholder="API Secret"></label>
                <button id="loginsubmit" class="btn blue">Submit</button>
            </form>
            <div class="clear"></div>
        </div>
    </div>
<?php
    docs_enqueue_script("//cdn.lrcontent.com/hub/prod/js/CustomInterface.2.js");
    docs_enqueue_script(THEME_URL . "assets/javascripts/html5sdk.min.js");
}
docs_enqueue_script(THEME_URL . "assets/javascripts/functions.min.js");

docs_enqueue_script(THEME_URL . "assets/javascripts/split.min.js");
docs_enqueue_script(THEME_URL . "assets/javascripts/navigation.min.js");

$hooks->do_action('docs_footer_script');
