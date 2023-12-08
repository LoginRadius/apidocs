
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
    
    <div id="panel2"> 
            <div class="api custom-container">
                <article id="protactedContent" class="protactedContent api md-content__inner md-typeset ">
                    <?php require_once 'includes/apis/content.php'; ?>
                </article>
            
            </div>    
            <div class="footer_api_docs">
            <?php
            require_once 'includes/footerContent.php';

            ?>        
</div>      
    </div>
    
    <div class="close-overlay"></div>
    
</div>

            <?php
            require_once 'includes/footer.php';?>

<script>
    jQuery(document).ready(function ($) {
        var sdkMarkArray = {};
        loadSideMenu(sdkMarkArray);
        pageLoad(window.location.pathname, sdkMarkArray);
//        resizeSidebar($('.custom-container'));
    });
</script>

<script src="<?php echo THEME_URL; ?>assets/javascripts/navigation.min.js" type="text/javascript"></script>


</body>

</html>

<!-- End of apidocument.php --> 