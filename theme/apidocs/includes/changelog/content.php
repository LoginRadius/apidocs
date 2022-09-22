<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
if ($document != API_CHANGELOG_DOCS) {
    $parse = explode('/', $document);
    $year = isset($parse[1]) ? trim($parse[1]) : '';
    $month = isset($parse[2]) ? trim($parse[2]) : '';
    //select all files that short by time
    $costomPost = array();
    foreach ($sideMenus as $key => $changelog) {
        if (isset($changelog['date'])) {
            if (date('Y/F', strtotime($changelog['date'])) == $year . '/' . $month) {
                $costomPost[] = $changelog;
            }
        }
    }
    $sideMenus = $costomPost;
}

if (is_array($sideMenus)) {
    $count = 0;
    foreach ($sideMenus as $key => $changelog) {
        if (file_exists(API_CHANGELOG_DIR. $changelog['url'] . ".json") && $count < 10) {
            $changelogContent = json_decode(file_get_contents(API_CHANGELOG_DIR. $changelog['url'] . ".json"));
            $added = isset($changelogContent->changelog->ADDED) ? count($changelogContent->changelog->ADDED) : 0;
            $improved = isset($changelogContent->changelog->IMPROVED) ? count($changelogContent->changelog->IMPROVED) : 0;
            $fixed = isset($changelogContent->changelog->FIXED) ? count($changelogContent->changelog->FIXED) : 0;
            ?>
            <div class="hub-changelog-post">
                <div class="col-10">
                <div class="post-title col-8">
                    <h1>
                        <a style="font-size: 26px;" href="<?php echo API_CHANGELOG_URL .'/'. str_replace(API_CHANGELOG_DIR, API_CHANGELOG_DOCS.'/', rtrim(rtrim($changelog['url'], 'json'), '.')); ?>">
                            <?php echo $changelogContent->name ?>
                        </a>
                    </h1>
                </div>
                <div class="col-10 hub-changelog-info">
                    <?php if (!empty($changelogContent->auther)) { ?>
                        <div class="floated-left auther">
                            <i class="fa fa-user fa-mono fa-right"></i>
                            <?php echo $changelogContent->auther; ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($changelogContent->created_date)) { ?>
                        <div class="floated-left created-date">
                            <i class="fa fa-clock-o fa-mono fa-right"></i>
                            <?php echo getTime($changelogContent->created_date); ?>
                        </div>
                    <?php } ?>
                    <div class="label status-success floated-left change-label">
                        <?php echo ($added + $improved + $fixed); ?> changes
                    </div>
                </div>
                </div>
                <div class="col-10">
                    
                    <div class="content-body">
                        <!-- Gah, you have to manually restart the app if you change this!-->
                        <div class="magic-block-textarea">
                            <p>
                                <?php
                                $limit = strpos($changelogContent->description, '<br>');
                                if ($limit === false) {
                                    $limit = strpos($changelogContent->description, '.');
                                }
                                if ($limit === false) {
                                     $limit = 250;
                                }
                                echo substr($changelogContent->description, 0, $limit);
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="changelog-preview">
                        <ul>
                            <?php if ($added != 0) { ?>
                                <li>
                                    <?php echo ($added); ?> added
                                </li>
                                <?php
                            }
                            if ($improved != 0) {
                                ?>
                                <li>
                                    <?php echo ($improved); ?> improved
                                </li>
                                <?php
                            }
                            if ($fixed != 0) {
                                ?>
                                <li>
                                    <?php echo ($fixed); ?> fixed
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div> 
            <div style="clear:both;"></div>
            <hr>
            <?php
        } else {
            break;
        }
        $count++;
    }
}
