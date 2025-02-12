<!-- This is the page that render when trying to go to an invalid path -->


<?php
if(!defined('ROOT_PATH')){
    header("Location: /");
}
require_once 'includes/support_header.php';?>

<div class="close-overlay"></div>


<div class="error-page maincontainer">
    <h3>404</h3>
    <h1 class="entry-title">Page Not Found</h1>
    <p>Sorry, this file might have been moved or deleted. Try one of these links:</p>
    
    <div class="links-404">
        <div>
            <a href="https://www.loginradius.com/">Home</a>
        </div>
        <div>
            <a href="https://www.loginradius.com/integrations-overview/">Integrations</a>
        </div>
        <div>
            <a href="https://www.loginradius.com/developers">Developers</a>
        </div>
        <div>
            <a href="<?php echo API_DOCS_URL ;?>">Api Docs</a>
        </div>
        
        
        <div>
            <a href="https://www.loginradius.com/registration-service/standard-login/">Products</a>
        </div>
        <div>
            <a href="https://www.loginradius.com/pricing">Pricing</a>
        </div>
        <div>
            <a href="<?php echo ROOT_URL ;?>">Support Docs</a>
        </div>
        <div>
            <a href="https://www.loginradius.com/contact-sales/">Contact Us</a>
        </div>
    </div>


    <div class="clear"></div>
</div>

<div class = "footer_404">
<?php require_once 'includes/footerContent.php'; ?>
    
<?php require_once 'includes/footer.php'; ?>
</div>
