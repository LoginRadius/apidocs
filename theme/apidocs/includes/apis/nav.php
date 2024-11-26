<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
?>
<!-- Beginnig of nav.php -->
<nav class="md-nav md-nav--primary">

   <!-- <label class="main-section-label"><?php echo ucwords($menu); ?><br></label> -->

   <label class="md-nav__title md-nav__title--site" for="drawer"> 
        <!-- <img src="<?php echo THEME_URL; ?>support-assets/images/logo.svg"> -->
        <div class="md-icon md-icon--menu md-header-nav__button" onclick="closeNavBar()"></div>
    </label>
    <ul id="menucontainer" class="md-nav__list first-list" data-md-scrollfix="">
        <?php //var_dump($sideMenus);die;?>
        <?php    if(!is_null($menu) && empty($menu)){?>
            <?php echo createSideBar($sideMenus); ?>
     <?php   }?>

     <?php    if(!is_null($menu) && !empty($menu) && !empty($sideMenus)){?>
        <?php echo createSideBar($sideMenus[$menu]); ?>
     <?php   }?>
    </ul>
</nav>

<?php
$count = 0;
function createSideBar($result) {
    $html = '';
    global $count;
    $count++;

   
    foreach ($result as $key => $value) {
        if (isset($value['url']) && isset($value['title'])) {
            $class = '';
            if (isset($value['type']) && !empty($value['type'])) {
                $class = ' method-' . $value['type'];
            }
            $html .= '<li class="md-nav__item">';
            $html .= '<a  onclick=addBreadCrumb("'.$value['url'].'",true,true) title ="' . $value['title'] . '" href="' .SUPPORT_DOCS_URL . 'api' . '/' . $value['url'] . '" class="md-nav__link md-nav__link_custom' . $class . '">' . $value['title'];

            $html .= '</a>';
            $html .= '</li>';
        } else if (is_array($value)) {
  
            if ($key == 'basic') {
                $html .= createSideBar($value);
            } else {

                $html .= '<li class="md-nav__item md-nav__item--nested">';
                $html .= '<input class="md-toggle md-nav__toggle" data-md-toggle="nav-' . $count . '" type="checkbox" id="nav-' . $count . '">';
                $html .= '<label class="md-nav__link" for="nav-' . $count . '">' . $key . '</label>';
                $html .= '<ul class="md-nav__list" data-md-scrollfix="">';
                $html .= createSideBar($value);
                $html .= '</ul></li>';
            }
        } else {

            $html .= '<li class="menuSepretor">' . $value . '</li>';
        }
    }
    return $html;
}
//<!-- End of nav.php -->

