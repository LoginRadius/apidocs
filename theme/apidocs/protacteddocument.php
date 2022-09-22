<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
require_once 'includes/header.php';
?>

<div class="md-sidebar md-sidebar--primary" data-md-component="navigation">
    <div class="md-sidebar__scrollwrap">
        <div class="md-sidebar__inner">
        </div>
    </div>
</div>
<div class="col-8">
    <article id="protactedContent" class="protactedContent md-content__inner md-typeset">
        <div class="protactedOver">
            <div class="protactedText">
                <h2>This content is password protected.</h2>
                <p>To view it please enter your password below:</p>
                <div id="protactedMessage"></div>
                <input id="protactedPassword" class="protacted-password" placeholder="Password..."/>
                <br><button id="protactedPasswordSubmit" class="protacted-password-submit">Submit</button>
            </div>
        </div>
    </article>
</div>

<?php
require_once 'includes/footer.php';
?>
<script>
    jQuery(document).ready(function ($) {
        $('#protactedPasswordSubmit').click(function () {
            protactedDocsRequest();
        });
    });
</script>
</body>
</html>
