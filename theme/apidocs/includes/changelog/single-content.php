<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$changelogContent = file_get_contents(str_replace(API_CHANGELOG_DOCS.'/', API_CHANGELOG_DIR, $document) . '.json');
$changelogDoc = json_decode($changelogContent);
$changelog['name'] = isset($changelogDoc->name) ? $changelogDoc->name : '';
$changelog['description'] = isset($changelogDoc->description) ? $changelogDoc->description : '';
$changelog['changelog'] = isset($changelogDoc->changelog) ? $changelogDoc->changelog : '';
$changelog['auther'] = isset($changelogDoc->auther) ? $changelogDoc->auther : '';
$changelog['created_date'] = isset($changelogDoc->created_date) ? $changelogDoc->created_date : '';
$changelog['status'] = isset($changelogDoc->status) ? $changelogDoc->status : '';
?>
<div class="single-changelog-post">
    <div class="col-10">
        <div class="post-title">
            <h1>
                <?php echo $changelog['name']; ?>
            </h1>
            <hr>
        </div>
    </div>
    <div class="col-10">
    <div class="col-8 content-body">
            <!-- Gah, you have to manually restart the app if you change this!-->
            <div class="magic-block-textarea">
                <p>
                    <?php echo $changelog['description']; ?>
                </p>
            </div>
        </div>
   
    <div class="col-10 hub-changelog-info">
        <?php if (!empty($changelog['auther'])) { ?>
            <div class="floated-left auther">
                <i class="fa fa-user fa-mono fa-right"></i>
                <?php echo $changelog['auther']; ?>
            </div>
        <?php } ?>
        <?php if (!empty($changelog['created_date'])) { ?>
            <div class="floated-left created-date-single ">
                <i class="fa fa-clock-o fa-mono fa-right"></i>
                <?php echo getTime($changelog['created_date']); ?>
            </div>
        <?php } ?>
    </div>
    </div>
    <div class="col-10">
        <div class="changelogsection">
            <?php
            if (count($changelog['changelog']) > 0) {
                ?><h1 style="font-size: 22pt; margin-top: 10px; margin-bottom: 10px;">Change Log</h1>
                <table class="changelog">
                    <?php
                    foreach ($changelog['changelog'] as $key => $values) {
                        foreach ($values as $value) {
                            ?>
                            <tr>
                                <th class="changelog-tag">
                                    <div class="<?php echo strtolower($key); ?>">
                                        <?php echo $key; ?>
                                    </div>
                                </th>
                                <td>
                                    <?php echo $value->text; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
    
</div>
