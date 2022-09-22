<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
?>
</div>
</main>




<!--
<footer class="md-footer">

    <? php // if ($is_documentPage || $is_apiPage || $is_supportPage) { 
    ?>
        <div class="md-footer-nav">
            <nav class="md-footer-nav__inner md-grid">
                <a href="" title="" class="md-flex md-footer-nav__link md-footer-nav__link--prev" rel="prev">
                    <div class="md-flex__cell md-flex__cell--shrink">
                        <i class="md-icon md-icon--arrow-back md-footer-nav__button"></i>
                    </div>
                    <div class="md-flex__cell md-flex__cell--stretch md-footer-nav__title">
                        <span class="md-flex__ellipsis"></span>
                    </div>
                </a>
                <a href="" title="" class="md-flex md-footer-nav__link md-footer-nav__link--next" rel="next">
                    <div class="md-flex__cell md-flex__cell--stretch md-footer-nav__title">
                        <span class="md-flex__ellipsis"></span>
                    </div>
                    <div class="md-flex__cell md-flex__cell--shrink">
                        <i class="md-icon md-icon--arrow-forward md-footer-nav__button"></i>
                    </div>
                </a>
            </nav>
        </div>
    <? php // } 
    ?>

    <div class="md-footer-meta md-typeset">
        <div class="md-footer-meta__inner md-grid">

         <?php //require_once 'social.php'; 
            ?> 
             <?php //docs_enqueue_style(THEME_URL . "assets/stylesheets/font-awesome.min.css");
                ?>
            <div class="md-footer-copyright__highlight">
                 <h2 style = "text-align: center;">LoginRadius </h2>
              Copyrights <?php //echo Date('Y'); 
                            ?> LoginRadius Inc. | 
                <a href="https://www.loginradius.com/terms">Terms</a> | 
                <a href="https://www.loginradius.com/privacy">Privacy</a> |
                <a href="https://www.loginradius.com/contact-sales/">Contact</a>
            </div>

        </div>
    </div>

</footer>
-->
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
    docs_enqueue_script("//cdn.loginradius.com/hub/prod/js/CustomInterface.2.js");
    docs_enqueue_script(THEME_URL . "assets/javascripts/html5sdk.js");
}
docs_enqueue_script(THEME_URL . "assets/javascripts/functions.js");

docs_enqueue_script(THEME_URL . "assets/javascripts/split.min.js");
$hooks->do_action('docs_footer_script');
