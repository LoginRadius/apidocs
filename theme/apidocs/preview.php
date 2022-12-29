<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}

require_once 'includes/header.php';
?>
<div class="md-editor-wrap">
<textarea id="previewcontainer" data-provide="markdown" placeholder="MarkDown Code"></textarea>
<div id="mdcontainer" class="mdcontainer md-typeset"></div>
</div>
<div class="clear"></div>

<div id="imageUploader" style="display: none;">
    <div class="popupContainer">
        <div id="popupClose" class="btnright"><i class="fa fa-2x fa-times"></i></div>
        <h2 style="text-align: center;">Upload Image On Server</h2>
        <div style="clear:both;"></div>
        <div id="processBar"><div class="status"></div></div>
        <form name="demoFiler" action="<?php echo APIS_URL; ?>imageuploader.php" id="demoFiler" enctype="multipart/form-data">
            <input type="file" name="multiUpload" id="multiUpload"/>
            <input type="submit" name="submitHandler" id="submitHandler" value="Upload" class="btn blue btnright"/>
            <div style="clear:both;"></div>
        </form>
    </div>
</div>

<div class = "previewFooter">
<?php

require_once 'includes/footerContent.php'; 
require_once 'includes/footer.php';
?>
</div>

<?php
docs_enqueue_style(THEME_URL."assets/stylesheets/preview.css");
docs_enqueue_style("//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
docs_enqueue_script(THEME_URL."assets/javascripts/marked.js");
docs_enqueue_script(THEME_URL."assets/javascripts/bootstrap-markdown.js");
docs_enqueue_script(THEME_URL."assets/javascripts/preview.js");

