<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$is_documentPage = $is_version = $is_supportPage = $is_apiPage = '';
require_once THEME_DIR . 'includes/support_header.php';
?>
<div class="col-8">
    <article id="protactedContent" class="protactedContent md-content__inner md-typeset">
        <div class="protactedOver">
            <div class="protactedText">
                <h2>This website is password protected.</h2>
                <p>Please enter your credentials below:</p>
                <div id="protactedMessage"></div>
                <input id="protactedUserName" class="protacted-user-name" placeholder="Enter Username ..."/><br><br>
                <input id="protactedPassword" class="protacted-password" placeholder="Enter Password ..."/>
                <br><button id="protactedPasswordSubmit" class="protacted-password-submit">Submit</button>
            </div>
        </div>
    </article>
</div>

<?php
require_once THEME_DIR. 'includes/footer.php';
?>
<script>
    jQuery(document).ready(function ($) {
        $("#protactedMessage").html('').hide();
        $('#protactedPasswordSubmit').click(function () {
            protactedSiteRequest();
        });

        function protactedSiteRequest() {
            var username = $("#protactedUserName").val();
            var password = $("#protactedPassword").val();
            $("#protactedMessage").html('').hide();
            if (username != '' && password != '') {
                setCookie('protactedUserName', username, 1);
                setCookie('protactedPassword', password, 1);
                location.reload();
            } else {
                $("#protactedMessage").html('Fields are require parametter').show();
            }
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
        }
    });
</script>
</body>
</html>
