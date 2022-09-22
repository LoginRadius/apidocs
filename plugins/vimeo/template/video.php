<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$is_documentPage = $is_version = $is_supportPage = $is_apiPage = '';
require_once THEME_DIR . 'includes/header.php';
?>
<div class="col-12">
    <article id="vimeo_rss" class="md-content__inner md-typeset">
        <h1 class="vimeo_title">Our Platform Video library</h1>
	
        <div class="col-12" style="clear: both;">
		<div style="width:100%">
			<div style="margin-left:auto;margin-right:auto;width:50%;">On this page, you will find tutorials and guided admin-console tours that will help in getting started with the LoginRadius platform</div>
		</div>
            <?php
            $count = 0;
            $col = 3;
            include_once PLUGIN_DIR . 'vimeo/class/simple_html_dom.php';
            $url = "https://www.youtube.com/feeds/videos.xml?playlist_id=PL3PS687CKFEGgaG8SLSRqqhvvbRjDIesw";
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $xmlDocHtml = file_get_html($url, false, stream_context_create($arrContextOptions));
            if ($xmlDocHtml->find('entry')) {
                foreach ($xmlDocHtml->find('entry') as $videoItem) {
                        
                    $description = $videoItem->find('media:group',0)->innertext;
                   
                    $imageURL = $videoIframe = $videoDescription = $videoAuther = '';
                    if ($videoItem->find('media:thumbnail', 0)) {
                        $imageURL = 'style="background-image: url(' . $videoItem->find('media:thumbnail', 0)->url . ');"';

                    }
                    if (!empty($description)) {
                        $descriptionHTML = str_get_html(html_entity_decode($videoItem));
                            $videoID = $descriptionHTML->find('yt:videoId', 0)->innertext;
                            $videoIframe = "https://www.youtube.com/embed/".$videoID;
                            $videoDescription = $description;                        
                    }
                    if (($count % $col) === 0) {
                        ?>
                            </div><div class="col-12" style="clear: both;">
                        <?php
                    }
                    ?>
                    <div class="customer_video_loading col-<?php echo $col; ?>">
                        <a href="javascript:void(0);" class="video-pop">
                            <input type="hidden" class="video-iframe" value="<?php echo htmlentities('<iframe src="' . $videoIframe . '?title=0&amp;byline=0&amp;portrait=0" width="960" height="540" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>'); ?>">
                            <div class="video_thumb" <?php echo $imageURL; ?>></div>
                            <h3>
                                <?php
                                if ($videoItem->find('title', 0)) {
                                    echo $videoItem->find('title', 0)->innertext;
                                }
                                ?>
                            </h3>
                            <p><?php echo $videoDescription; ?></p>
                            <p><?php //echo $videoAuther; ?></p>
                        </a>
                    </div><?php
                    $count++;
            }
            }
            ?>
        </div>
    </article>
</div>
<div class="video_popout" style="display: none;">
    <div class="video"></div>
</div>
<?php
require_once THEME_DIR . 'includes/footer.php';
?>
</body>
</html>
