<?php
$themeSchedule = array(
    array("newYear", "December 29", "January 7"),
    array("springSeason", "March 20", "June 20"),
    array("autumnSeason", "September 23", "October 26"),
    array("halloween", "October 27", "November 5"),
    array("diwali", "November 10", "November 19"),
    array("christmas", "December 18", "December 28")
);
$isThemeScheduled = false;
foreach ($themeSchedule as $info) {
    $occasion = $info[0];
    $currentYear = date("Y");
    $startDateTime = strtotime($info[1] . " " . $currentYear);
    if (strcmp($occasion, "newYear") == 0) {
        $currentYear = date("Y") + 1;
    }
    $endDateTime = strtotime($info[2] . " " . $currentYear);
    $currentDate = strtotime(date("F d Y"));
    //$currentDate = strtotime("January 1 2024"); // For Testing
    if ($currentDate >= $startDateTime && $currentDate <= $endDateTime) {
        $isThemeScheduled = true;
        if (strcmp($occasion, "christmas") == 0 || strcmp($occasion, "newYear") == 0) {
?>
            <script type="text/javascript" async="" src="<?php echo ROOT_URL; ?>theme/apidocs/assets/javascripts/snowstorm.js"></script>
        <?php
        }
        ?>
        <img class="rocket" style="max-width: 565px" src="<?php echo THEME_URL; ?>/assets/images/<?php echo ($occasion) ?>.svg" alt="Theme">
    <?php
    }
}
if (!$isThemeScheduled) {
    ?>
    <img class="stars" src="<?php echo THEME_URL; ?>/assets/images/rocket/rocket-annimations.svg" alt="Rocket Animation">
<?php
}
?>