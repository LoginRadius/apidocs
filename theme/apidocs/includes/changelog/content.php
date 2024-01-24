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
?>
<?php ?>
<div class="changelog-wrap">
    <?php
    if (is_array($sideMenus)) {
        $count = 0;
        foreach ($sideMenus as $key => $changelog) {
            if (file_exists(API_CHANGELOG_DIR . $changelog['url'] . ".json") && $count < 10) {
                $changelogContent = json_decode(file_get_contents(API_CHANGELOG_DIR . $changelog['url'] . ".json"));
                $added = isset($changelogContent->changelog->ADDED) ? count($changelogContent->changelog->ADDED) : 0;
                $improved = isset($changelogContent->changelog->IMPROVED) ? count($changelogContent->changelog->IMPROVED) : 0;
                $fixed = isset($changelogContent->changelog->FIXED) ? count($changelogContent->changelog->FIXED) : 0;
    ?>


                <div class="changelog-card has-bg">
                    <div class="card-header">
                        <div class="title">
                            <h2> <a href="<?php echo API_CHANGELOG_URL . '/' . str_replace(API_CHANGELOG_DIR, API_CHANGELOG_DOCS . '/', rtrim(rtrim($changelog['url'], 'json'), '.')); ?>">
                                    <?php echo $changelogContent->name ?>
                                </a></h2>
                            <div class="changes status-success"> <?php echo ($added + $improved + $fixed); ?> changes</div>
                        </div>
                        <div class="description">
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
                    <div class="card-footer">
                        <div class="author">
                            <ul>
                                <li>
                                    <?php if (!empty($changelogContent->auther)) { ?>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.6668 17.5V15.8333C16.6668 14.9493 16.3156 14.1014 15.6905 13.4763C15.0654 12.8512 14.2176 12.5 13.3335 12.5H6.66683C5.78277 12.5 4.93493 12.8512 4.30981 13.4763C3.68469 14.1014 3.3335 14.9493 3.3335 15.8333V17.5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.99984 9.16667C11.8408 9.16667 13.3332 7.67428 13.3332 5.83333C13.3332 3.99238 11.8408 2.5 9.99984 2.5C8.15889 2.5 6.6665 3.99238 6.6665 5.83333C6.6665 7.67428 8.15889 9.16667 9.99984 9.16667Z" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        <div><?php echo $changelogContent->auther; ?></div>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if (!empty($changelogContent->created_date)) { ?>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.8333 3.33333H4.16667C3.24619 3.33333 2.5 4.07952 2.5 5V16.6667C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6667V5C17.5 4.07952 16.7538 3.33333 15.8333 3.33333Z" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3335 1.66667V5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.6665 1.66667V5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2.5 8.33333H17.5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div><?php echo getTime($changelogContent->created_date); ?></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="numbers">
                            <ul>
                                <?php if ($added != 0) { ?>
                                    <li>
                                        <b><?php echo ($added); ?></b> added
                                    </li>
                                <?php
                                }
                                if ($improved != 0) {
                                ?>
                                    <li>
                                        <b><?php echo ($improved); ?></b> improved
                                    </li>
                                <?php
                                }
                                if ($fixed != 0) {
                                ?>
                                    <li>
                                        <b><?php echo ($fixed); ?></b> fixed
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

    <?php
            } else {
                break;
            }
            $count++;
        }
    }
    ?>

</div>