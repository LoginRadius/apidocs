<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
require_once 'includes/header.php';
?>
<div class="split-panels changelog-page">
    <div id="panel1" class="md-sidebar md-sidebar--primary md-sidebar-width" data-md-component="navigation">
        <div class="md-sidebar__scrollwrap">
            <div class="md-sidebar__inner">
                <?php require_once 'includes/changelog/nav.php'; ?>
            </div>
        </div>
    </div>
    <div id="panel2">

        <div class="col-8 custom-container  ">
            <article class="md-content__inner md-typeset">
                <div class="rssdiv">
                    <i class="fa fa-feed rssicon"></i>
                    <span class="Feedtext">
                        <b>Subscribe to this feed :</b>
                        Copy the <a href="<?php echo ROOT_URL . 'api/changelog/feed'; ?>" class="rsslink" target="_blank">RSS Feed URL</a> and paste it into your News Reader.
                    </span>
                </div>
                <h1 id="changelog">Changelog</h1>
                <p>Stay up to date with all of the latest additions and improvements we've made to LoginRadius.</p>
                <?php require_once 'includes/changelog/content.php'; ?>
            </article>
        </div>
        <div class="footer_404">
            <?php require_once 'includes/footerContent.php'; ?>

            <?php require_once 'includes/footer.php'; ?>
        </div>
    </div>
    <div class="close-overlay"></div>
    <script src="<?php echo THEME_URL; ?>assets/javascripts/navigation.min.js" type="text/javascript"></script>
</div>