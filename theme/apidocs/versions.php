<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($document == "versions") {
    require_once 'includes/header.php';
    ?>

<div class="close-overlay"></div>

    <article id="mdcontainer" class="versions-page mdcontainer md-content__inner md-typeset">
        <h1>Versions</h1>
        <hr>
        <?php foreach ($versioning as $versions) {
            if (isset($versions->status) && $versions->status == 'public') {
                ?>


                <div class="version">
                    <a href="<?php echo ROOT_URL . API_DOCS; ?>/<?php echo $versions->value; ?>">
                        <div>
                            <i class="fa fa-check-circle right-<?php echo $versions->type; ?>"></i> 
                            <p><?php echo $versions->name; ?></p>
                            <div class="<?php echo $versions->type; ?>"></div>
                        </div>

                        <div><i class="fa fa-clock-o"></i> <?php echo getTime($versions->date); ?></div>
                    </a>
                </div>


                <?php
            }
        }
        ?>
    </article>

<?php require_once 'includes/footerContent.php'; ?>

    <?php
    require_once 'includes/footer.php';
} else {
    $sections = json_decode(file_get_contents(API_MENU_DIR .$document. '.json'), true);
    if (!empty($sections)) {
        foreach ($sections as $section) {
            if (isset($section['basic'][0]['url'])) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . API_DOCS_URL . "/" . $section['basic'][0]['url']);
                exit;
            }else if (isset($section['Getting Started'][0]['url'])) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . API_DOCS_URL . "/" . $section['Getting Started'][0]['url']);
                exit;
            }
        }
    }
}

?>

