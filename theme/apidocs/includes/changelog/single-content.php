<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$changelogContent = file_get_contents(str_replace(API_CHANGELOG_DOCS . '/', API_CHANGELOG_DIR, $document) . '.json');
$changelogDoc = json_decode($changelogContent);
$changelog['name'] = isset($changelogDoc->name) ? $changelogDoc->name : '';
$changelog['description'] = isset($changelogDoc->description) ? $changelogDoc->description : '';
$changelog['changelog'] = isset($changelogDoc->changelog) ? $changelogDoc->changelog : '';
$changelog['auther'] = isset($changelogDoc->auther) ? $changelogDoc->auther : '';
$changelog['created_date'] = isset($changelogDoc->created_date) ? $changelogDoc->created_date : '';
$changelog['status'] = isset($changelogDoc->status) ? $changelogDoc->status : '';
?>
<div class="single-changelog-post">
    <div class="changelog-wrap">
        <div class="changelog-card">
            <div class="card-header">
                <div class="title">
                    <h1> <?php echo $changelog['name']; ?></h1>
                </div>
                <div class="description">
                    <p><?php echo $changelog['description']; ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="author">
                    <ul>
                        <li>

                            <?php if (!empty($changelog['auther'])) { ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.6668 17.5V15.8333C16.6668 14.9493 16.3156 14.1014 15.6905 13.4763C15.0654 12.8512 14.2176 12.5 13.3335 12.5H6.66683C5.78277 12.5 4.93493 12.8512 4.30981 13.4763C3.68469 14.1014 3.3335 14.9493 3.3335 15.8333V17.5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.99984 9.16667C11.8408 9.16667 13.3332 7.67428 13.3332 5.83333C13.3332 3.99238 11.8408 2.5 9.99984 2.5C8.15889 2.5 6.6665 3.99238 6.6665 5.83333C6.6665 7.67428 8.15889 9.16667 9.99984 9.16667Z" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <div><?php echo $changelog['auther']; ?></div>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if (!empty($changelog['created_date'])) { ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8333 3.33333H4.16667C3.24619 3.33333 2.5 4.07952 2.5 5V16.6667C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6667V5C17.5 4.07952 16.7538 3.33333 15.8333 3.33333Z" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.3335 1.66667V5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.6665 1.66667V5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.5 8.33333H17.5" stroke="#E8EAED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div><?php echo getTime($changelog['created_date']); ?></div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10">
        <div class="changelogsection">
            <h2>Change Log</h2>
            <div class="changelog-list">
                <?php
                if (count((array)$changelog['changelog']) > 0) {
                ?>
                    <?php
                    foreach ($changelog['changelog'] as $key => $values) {
                        $isCount = 1;
                    ?> <div class="<?php echo strtolower($key); ?>-list"> <?php
                                                                            foreach ($values as $value) {
                                                                                if ($isCount == 1) { ?>
                                    <div class="list-blocks">
                                        <div class="change-log">
                                            <div class="changes">
                                                <div class="title"><?php echo strtolower($key); ?> </div>
                                                <div class="<?php echo strtolower($key); ?>"><?php echo count($values); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                                                                    $isCount++;
                                                                                } ?>
                                <div class="updates">
                                    <p><?php echo $value->text; ?></p>
                                </div>

                            <?php
                                                                            }
                            ?>
                        </div> <?php
                            }
                                ?>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>