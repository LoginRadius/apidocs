<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
require_once 'includes/header.php';
?>


<div class="split-panels">
    <div id="panel1" class="md-sidebar md-sidebar--primary md-sidebar-width" data-md-component="navigation">
        <div class="md-sidebar__scrollwrap">
            <div class="md-sidebar__inner">
                <?php require_once 'includes/apis/nav.php'; ?>
            </div>

        </div>

    </div>
    <!--<div class="md-sidebar-handle"></div>-->

    <div id="panel2">
        <div class="md-content">

            <div class="bread-crumb"></div>

            <article id="mdcontainer" class="mdcontainer md-content__inner md-typeset">
                <?php require_once 'includes/docs/content.php'; ?>
            </article>
            <div class=" md-sidebar_footer">
                <?php require_once 'includes/footerContent.php'; ?>
                <?php
                require_once 'includes/footer.php';
                ?>
            </div>
        </div>

        <div class="md-sidebar md-sidebar--secondary" data-md-component="toc">
            <div class="feedback-div">
                <div class="feedback-div-button">
                    <h2>Is this page helpful?</h2>
                    <div class="feedback-button-wrap">
                        <button class="feedback-button fd_yes" title="Yes" value="Yes">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 131 115.2" style="enable-background:new 0 0 131 115.2;" xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        fill: none;
                                        stroke: #008000;
                                        stroke-width: 8;
                                        stroke-miterlimit: 10;
                                    }
                                </style>
                                <path class="st0" d="M3.1,76.8c0-7.8,0.1-15.6,0-23.4c0-2.6,0.8-3.5,3.4-3.4c6.5,0.2,13-0.1,19.5,0.1c7.1,0.2,12.9-2.4,17.9-7.3
                                c12-12,24.1-23.9,36.1-35.9c3.3-3.3,6.7-4.8,11.1-2.9c4.4,1.9,5.8,5.5,5.8,10.1c0,6.8-2.6,12.9-5.2,19.1c-3.7,9-3.6,9,6.1,9
                                c6,0,12,0,18,0c8.5,0.1,14.3,7,11.8,15c-5,16-10.5,31.9-15.9,47.8c-1.4,4.1-4.7,7-8.9,7c-14.8-0.1-29.6,1.4-44.3-0.9
                                c-7.5-1.2-14.3-5.3-22-6.1c-9.6-1.1-19.3-0.5-28.9-0.5c-3.6,0-4.5-1.1-4.4-4.5C3.2,92.1,3.1,84.4,3.1,76.8z" />
                            </svg>
                            <span>Yes</span>
                        </button>
                        <button class="feedback-button fd_no" title="No" value="No">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 131 115.2" style="enable-background:new 0 0 131 115.2;" xml:space="preserve">
                                <style type="text/css">
                                    .st1 {
                                        fill: none;
                                        stroke: #ff0000;
                                        stroke-width: 8;
                                        stroke-miterlimit: 10;
                                    }
                                </style>
                                <path class="st1" d="M127.9,38.4c0,7.8-0.1,15.6,0,23.4c0,2.6-0.8,3.5-3.4,3.4c-6.5-0.2-13,0.1-19.5-0.1c-7.1-0.2-12.9,2.4-17.9,7.3
                                c-12,12-24.1,23.9-36.1,35.9c-3.3,3.3-6.7,4.8-11.1,2.9c-4.4-1.9-5.8-5.5-5.8-10.1c0-6.8,2.6-12.9,5.2-19.1c3.7-9,3.6-9-6.1-9
                                c-6,0-12,0-18,0c-8.5-0.1-14.3-7-11.8-15c5-16,10.5-31.9,15.9-47.8c1.4-4.1,4.7-7,8.9-7C43.2,3.5,58,2,72.7,4.3
                                c7.5,1.2,14.3,5.3,22,6.1c9.6,1.1,19.3,0.5,28.9,0.5c3.6,0,4.5,1.1,4.4,4.5C127.7,23.1,127.9,30.8,127.9,38.4z" />
                            </svg>
                            <span>No</span>
                        </button>
                    </div>
                    <form class="feedback-form" style="display: none">
                        <div class=feedback-textfield>
                            <textarea id="feedback-textarea" rows="4" maxlength="350" placeholder="Any additional feedback?"></textarea>
                        </div>
                        <div class="feedback-submit">
                            <button class="feedback-submit-button-skip" type="button" title="skip">Skip</button>
                            <button class="feedback-submit-button-submit" type="button" title="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="feedback-message"><span>Thank you.</span></div>
            </div>
            <div class="md-sidebar__scrollwrap">
                <hr class="feedback-line">

                <div class="md-sidebar__inner">
                    <?php require_once 'includes/docs/toc.php'; ?>
                </div>
            </div>
        </div>

    </div>

    <div class="close-overlay"></div>

</div>


<script src="<?php echo THEME_URL; ?>assets/javascripts/marked.min.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function($) {
        loadVersion();
        pageLoad(window.location.pathname);
        //        resizeSidebar($('.md-content'));


    });
</script>

<script src="<?php echo THEME_URL; ?>assets/javascripts/navigation.min.js" type="text/javascript"></script>
</body>

</html>