<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}

?>
<nav class="md-nav md-nav--primary">
    <label class="md-nav__title md-nav__title--site" for="drawer">
        <img src="<?php echo THEME_URL; ?>support-assets/images/logo.svg" alt="logo">
        <div class="md-icon mobileClose md-header-nav__button" onclick="closeNavBar()">123</div>
    </label>
    <ul id="changelogcontainer" class="md-nav__list changelogcontainer" data-md-scrollfix="">
        <li class="md-nav__item md-nav__item--nested">
            <label class="md-nav__link">RECENT POSTS</label>
            <ul class="md-nav__list" data-md-scrollfix="">
                <?php echo recentPosts($sideMenus, 1); ?>
            </ul>
        </li>
        <li class="md-nav__item md-nav__item--nested">
            <label class="md-nav__link">ARCHIVE</label>
            <ul class="md-nav__list" data-md-scrollfix="">
                <?php echo archivePosts($sideMenus); ?>
            </ul>
        </li>
    </ul>
</nav>

<?php

function archivePosts($result) {
    $html = '';
    $array = array();
    foreach ($result as $key => $value) {
        if (isset($value['date'])) {
            $array[] = date("Y/F", strtotime($value['date']));
        }
    }
    foreach (array_count_values($array) as $val => $k) {
        $class = '';
        if (isset($value['type']) && !empty($value['type'])) {
            $class = ' method-' . $value['type'];
        }
        $html .= '<li class="md-nav__item">';
        $temp = explode('/', $val);
        $year = isset($temp[0])?$temp[0]:'';
        $month = isset($temp[1])?$temp[1]:'';
        $html .= '<a href="' . API_CHANGELOG_URL .'/'. $val . '" class="md-nav__link' . $class . '">' . $month .' '. $year . ' ('.$k.')</a>';
        $html .= '</li>';
    }
    return $html;
}

function recentPosts($result, $count) {
    $html = '';
    foreach ($result as $key => $value) {
        $count++;
        if ($count > 6) {
            break;
        }
        if (isset($value['url']) && isset($value['title'])) {
            $class = '';
            if (isset($value['type']) && !empty($value['type'])) {
                $class = ' method-' . $value['type'];
            }
            $html .= '<li class="md-nav__item">';
            $html .= '<a href="' . API_CHANGELOG_URL .'/'. $value['url'] . '" class="md-nav__link' . $class . '">' . $value['title'] . '</a>';
            $html .= '</li>';
        }
    }
    return $html;
}
