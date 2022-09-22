<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
require_once 'includes/header.php';
?>


<div class="split-panels changelog-page">

    <!--    <div>-->
    <div id="panel1" class="md-sidebar md-sidebar--primary md-sidebar-width" data-md-component="navigation">
        <div class="md-sidebar__scrollwrap">
            <div class="md-sidebar__inner">
                <?php require_once 'includes/changelog/nav.php'; ?>
            </div>
        </div>
    </div>

    <!--    </div>-->



    <div id="panel2">

        <div class="col-8 custom-container  floated-left">
            <article class="md-content__inner md-typeset floated-left">
                <?php require_once 'includes/changelog/single-content.php'; ?>
            </article>
        </div>


        <div class="footer_404 col-8  floated-left">
            <?php
            require_once 'includes/footerContent.php';
            ?>

            <?php
            require_once 'includes/footer.php';
            ?>
        </div>


    </div>


    <div class="close-overlay"></div>

    <script>
        jQuery(document).ready(loadChangelog());
    </script>

    <script src="<?php echo THEME_URL; ?>assets/javascripts/navigation.js" type="text/javascript"></script>
    </body>

    </html>