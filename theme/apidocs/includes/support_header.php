<?php
if (!defined('ROOT_PATH')) {
  header("Location: /");
} else if ($is_version == 'v1') {
  $sections = json_decode(file_get_contents(API_MENU_DIR . 'v1.json'), true);
  $navSections = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
} else {
  $sections = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
  $navSections = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'top-nav.json'), true);
}
global $hooks;
$hooks->do_action('init');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="<?php echo THEME_URL; ?>assets/images/favicon-lr.png">
  <link rel="icon" href="<?php echo THEME_URL; ?>assets/images/favicon-lr.png" type="image/x-icon">
  <?php docs_enqueue_script("//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"); ?>
  <?php docs_enqueue_script("//code.jquery.com/jquery-migrate-3.4.0.min.js"); ?>

  <script>
    if (window.jQuery) {

      //document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700|Roboto+Mono"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Barlow:400,500,700&display=swap"    rel="stylesheet" type="text/css"%3E'));
      //document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Inconsolata:400,500,700&display=swap"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="https://fonts.googleapis.com/icon?family=Material+Icons"    rel="stylesheet" type="text/css"%3E'));


    } else {
      document.write(unescape("%3Cscript src='<?php echo THEME_URL; ?>assets/javascripts/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Barlow.css"    rel="stylesheet" type="text/css"%3E'));
      //document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Inconsolata.css"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Material.css"    rel="stylesheet" type="text/css"%3E'));
      //document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/roboto.css"    rel="stylesheet" type="text/css"%3E'));
    }
  </script>

<script>
    setInterval(function() {
        fetch(window.location.href, { method: 'GET', cache: 'no-store' })
        .then(response => console.log('Session refreshed'))
        .catch(error => console.error('Error refreshing session:', error));
    }, 300000); // Every 5 minutes
</script>

  <script>
    var errorPage = "<?php echo ROOT_PATH . '404'; ?>";
    var rootPath = "<?php echo ROOT_PATH; ?>";
    var apiURL = "<?php echo APIS_URL; ?>";
    rootURL = "<?php echo ROOT_URL; ?>";
    <?php

    if ($is_apiPage) {

      $pageDir = API_APIS_DOC_DIR;
    } else {
      $pageDir = API_DOC_DIR;
    }
    ?>
    var docPath = "<?php echo $pageDir; ?>";
    <?php if ($is_version) { ?>
      var apiVersion = "<?php echo !empty($is_version) ? $is_version : 'v2'; ?>";
    <?php } ?>
  </script>
  <?php
  $sideMenus = isset($sideMenus) ? $sideMenus : '';
  echo $hooks->apply_filters('apidocs_page_meta', $document, $sideMenus);
  docs_enqueue_script(THEME_URL . "assets/javascripts/modernizr-facb31f4a3.js");
  docs_enqueue_script(THEME_URL . "assets/javascripts/jsonQ.min.js");

  ?>
  <style>
    code,
    kbd,
    pre {
      font-family: "Barlow", "Courier New", Courier, monospace
    }

    /* nightmode css */

    .ToggleNightModecontainer {
      display: flex;
      align-items: center;
      margin-right: 12px;
    }

    @media screen and (max-width: 1020px) {
      .ToggleNightModecontainer {
        margin-right: 0;
      }
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 40px;
      height: 22px;
    }

    .switch input {
      display: none;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff;
      -webkit-transition: .3s;
      transition: .3s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 2px;
      bottom: 2px;
      background-color: white;
      -webkit-transition: .3s;
      transition: .3s;
      border-radius: 50%;
    }

    input:checked+.slider {
      background-color: #fff;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #3C4043;
    }

    .slider:before {
      background-color: #000000;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(18px);
      -ms-transform: translateX(18px);
      transform: translateX(18px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    /* Dark Mode label styling */

    label[for="nightModeToggle"] {
      font-family: 'Barlow', Helvetica, Arial, sans-serif;
      margin-right: 8px;
      font-size: 16px;
      /* Adjust the spacing as needed */
    }
  </style>
  <?php
  docs_enqueue_style(THEME_URL . "assets/stylesheets/mega-menu.css");
  docs_enqueue_script(THEME_URL . "assets/javascripts/mega-menu.min.js");
  docs_enqueue_style(THEME_URL . "assets/stylesheets/style.css");
  echo $hooks->do_action('docs_head_script');
  ?>
</head>

<body>
  <?php
  echo $hooks->do_action('docs_top_body_script');
  ?>
  <header class="md-header">
    <nav class="md-header-nav md-grid ">
      <div class="bar">
        <div class="md-flex">

          <div class='md-flex-button' onClick='hideNavBar()' role="Button"> </div>
          <div class="logo">
            <a href="<?php echo SUPPORT_DOCS_URL; ?>" title="LoginRadius" class=" md-icon md-header-nav__button" style="padding: 0;">

              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1673.98 243.64">
                <defs>
                  <style>
                    .cls-1 {
                      fill: #008ecf;
                    }

                    .cls-2 {
                      fill: #fff;
                    }
                  </style>
                </defs>
                <path class="cls-1" d="M125.92,0A125.9,125.9,0,0,0,81.31,243.64L92,214a94.43,94.43,0,1,1,67.93,0l10.64,29.64A125.9,125.9,0,0,0,125.92,0Z" />
                <path class="cls-2" d="M102.59,184.36l10.65-29.67a31.47,31.47,0,1,1,25.36,0l10.65,29.67a63,63,0,1,0-46.66,0Z" />
                <path class="cls-1" d="M738.17,94.76c1.58,0,3.38.09,5.42.29s4,.46,6,.79,3.78.66,5.42,1a34.83,34.83,0,0,1,3.65.88l-3.16,16a59.7,59.7,0,0,0-20.11-3,48.15,48.15,0,0,0-10.15,1.08q-5,1.09-6.61,1.48v86.17H700.31v-98.2a126.09,126.09,0,0,1,16.17-4.43A103.88,103.88,0,0,1,738.17,94.76Z" />
                <path class="cls-1" d="M802.46,94.36q11,0,18.64,2.86a30.17,30.17,0,0,1,12.22,8.09,30.63,30.63,0,0,1,6.61,12.42,60.18,60.18,0,0,1,2,15.87v64.08l-6.6,1.09c-2.83.46-6,.88-9.57,1.28s-7.39.75-11.53,1.08-8.25.5-12.33.5a67.15,67.15,0,0,1-16-1.78,35.59,35.59,0,0,1-12.62-5.62A25.64,25.64,0,0,1,765,184.08a35.58,35.58,0,0,1-3-15.18,29.19,29.19,0,0,1,3.45-14.59,27.54,27.54,0,0,1,9.37-9.87,43.64,43.64,0,0,1,13.8-5.52,75.46,75.46,0,0,1,16.56-1.77,56.71,56.71,0,0,1,5.72.3c2,.19,3.85.46,5.62.78s3.32.63,4.64.89,2.23.46,2.76.59v-5.12a41.12,41.12,0,0,0-1-9,20.56,20.56,0,0,0-3.55-7.88,18,18,0,0,0-7-5.52,27.44,27.44,0,0,0-11.53-2.07A86.25,86.25,0,0,0,785,111.42a55.12,55.12,0,0,0-10.15,2.66L772.69,98.9a56.9,56.9,0,0,1,11.83-3.06A101.75,101.75,0,0,1,802.46,94.36ZM804,186.25c4.34,0,8.18-.1,11.54-.3a51.45,51.45,0,0,0,8.38-1.08V154.31a23.42,23.42,0,0,0-6.41-1.68,71.33,71.33,0,0,0-10.75-.69,70.18,70.18,0,0,0-8.77.59,26.87,26.87,0,0,0-8.48,2.47,18.19,18.19,0,0,0-6.41,5.12,13.46,13.46,0,0,0-2.56,8.58q0,9.86,6.31,13.7T804,186.25Z" />
                <path class="cls-1" d="M928.14,44.42h18.33v155c-4.2,1.18-30.3,2.36-38.84,2.36a57.53,57.53,0,0,1-21.29-3.74,45.6,45.6,0,0,1-16.17-10.65,47.15,47.15,0,0,1-10.36-16.86,64.78,64.78,0,0,1-3.64-22.38,72.93,72.93,0,0,1,3.05-21.69,48.84,48.84,0,0,1,9-17,40.87,40.87,0,0,1,14.5-11,46.45,46.45,0,0,1,19.62-3.94A47.81,47.81,0,0,1,918,96.92a50,50,0,0,1,10.16,4.54Zm0,74.2a37.88,37.88,0,0,0-9.67-5.33,36.26,36.26,0,0,0-13.8-2.56,29.38,29.38,0,0,0-13.5,2.86,24.67,24.67,0,0,0-9.17,7.88,33.3,33.3,0,0,0-5.13,11.93,66.48,66.48,0,0,0-1.58,14.79q0,17.94,8.88,27.71c5.91,6.5,14,8.76,23.8,8.76,5,0,18.32-.65,20.17-1.17Z" />
                <path class="cls-1" d="M1128.62,186.25q11.24,0,16.66-3a10,10,0,0,0,5.42-9.46,12.57,12.57,0,0,0-5.32-10.65q-5.33-3.94-17.55-8.87-5.91-2.37-11.34-4.84a39.88,39.88,0,0,1-9.36-5.81,25.44,25.44,0,0,1-6.31-8.09,25.78,25.78,0,0,1-2.37-11.63q0-13.6,10.06-21.59t27.41-8a78.74,78.74,0,0,1,8.67.49q4.34.5,8.09,1.19t6.6,1.48c1.91.52,3.38,1,4.44,1.38l-3.35,15.77a47,47,0,0,0-9.27-3.25,59.69,59.69,0,0,0-15.18-1.68,28,28,0,0,0-13.41,3.06,10.11,10.11,0,0,0-5.72,9.56,13,13,0,0,0,1.28,5.92,13.62,13.62,0,0,0,3.94,4.63,32.93,32.93,0,0,0,6.61,3.85q3.95,1.77,9.46,3.74,7.31,2.76,13,5.42a41,41,0,0,1,9.76,6.22,23.85,23.85,0,0,1,6.21,8.57,31,31,0,0,1,2.17,12.33q0,14.19-10.55,21.49t-30.07,7.29q-13.61,0-21.3-2.26c-5.12-1.51-8.61-2.67-10.45-3.45l3.36-15.78q3.15,1.18,10,3.55T1128.62,186.25Z" />
                <path class="cls-1" d="M1082,199.46l-40.82,2.17a45.3,45.3,0,0,1-20.3-3.45,31.8,31.8,0,0,1-12.92-9.67,37.3,37.3,0,0,1-6.8-14.88,86.1,86.1,0,0,1-2-19.13V96.92h18.33v53.64a86.81,86.81,0,0,0,1.29,16.16,27.31,27.31,0,0,0,4.23,10.85,16.86,16.86,0,0,0,7.89,6c3.29,1.25,8.76.93,13.61.58,11.36-.83,14-1.16,19.12-1.53V96.92H1082Z" />
                <rect class="cls-1" x="963.67" y="96.92" width="18.34" height="102.53" />
                <circle class="cls-1" cx="972.84" cy="56.25" r="11.83" />
                <path class="cls-2" d="M547.46,96.92c-4.34-1-29.91-2.16-38.45-2.16a54.14,54.14,0,0,0-20.9,3.84,44.67,44.67,0,0,0-15.68,10.65,45.84,45.84,0,0,0-9.76,16.17,60.85,60.85,0,0,0-3.35,20.6c0,8.55,1.34,23,3.7,29.19a44.42,44.42,0,0,0,9.66,15.48,37.89,37.89,0,0,0,14.3,9.17,51,51,0,0,0,17.45,3,46.36,46.36,0,0,0,15.87-2.47,48.86,48.86,0,0,0,9.17-4v4.34q0,14.19-7.19,20.7t-23.57,6.51c-2.5,0-19.83,0-25.32-.12v15.87c5.38,0,22.4,0,24.93,0q24.84,0,37.07-10.65t12.22-34.3ZM519.61,185a41.52,41.52,0,0,1-13.4,2.07,28.28,28.28,0,0,1-10.36-2A23.85,23.85,0,0,1,487,179a30.06,30.06,0,0,1-6.11-10.45c-1.52-4.21-2.42-16.37-2.42-22.29q0-16,8-25.63t22.78-9.67a90.85,90.85,0,0,1,12.52.69,63.85,63.85,0,0,1,7.39,1.48l.15,67A32.88,32.88,0,0,1,519.61,185Z" />
                <path class="cls-2" d="M447.13,148.19a64.83,64.83,0,0,1-3.55,22.09,50.58,50.58,0,0,1-10,16.95,43.74,43.74,0,0,1-15.28,11,50.55,50.55,0,0,1-38.65,0,43.83,43.83,0,0,1-15.28-11,50.39,50.39,0,0,1-10-16.95,64.83,64.83,0,0,1-3.55-22.09,65,65,0,0,1,3.55-22,50.23,50.23,0,0,1,10-17.06,43.8,43.8,0,0,1,15.28-10.94,50.43,50.43,0,0,1,38.65,0,43.71,43.71,0,0,1,15.28,10.94,50.41,50.41,0,0,1,10,17.06A65,65,0,0,1,447.13,148.19Zm-19.13,0q0-17.34-7.79-27.5T399,110.53q-13.41,0-21.2,10.16T370,148.19q0,17.35,7.79,27.51T399,185.85q13.41,0,21.19-10.15T428,148.19Z" />
                <path class="cls-2" d="M600.3,96.92l40.82-2.16a45,45,0,0,1,20.31,3.45,31.74,31.74,0,0,1,12.91,9.66,37.43,37.43,0,0,1,6.81,14.89,86.61,86.61,0,0,1,2,19.12v57.58H664.78V145.82a87.92,87.92,0,0,0-1.28-16.16,27.46,27.46,0,0,0-4.24-10.85,16.76,16.76,0,0,0-7.89-6c-3.29-1.25-7.6-.9-12.45-.66l-20.28,1v86.28H600.3Z" />
                <path class="cls-2" d="M336.94,201.43c-.93-.54-22.59-13.71-22.59-32.45V44.42h18.34V169c0,11,15.18,20.37,15.32,20.49Z" />
                <rect class="cls-2" x="564.77" y="96.92" width="18.34" height="102.53" />
                <circle class="cls-2" cx="573.94" cy="56.25" r="11.83" />
                <rect class="cls-2" x="1274.02" y="44.41" width="5.28" height="199.22" />
                <path class="cls-2" d="M1467.43,147.58q0,13.18-4.11,22.93a42.26,42.26,0,0,1-11.57,16.11,49.07,49.07,0,0,1-17.87,9.53,78.6,78.6,0,0,1-22.85,3.14q-6.15,0-13.55-.51a80.55,80.55,0,0,1-13.41-2V98.36a80.5,80.5,0,0,1,13.41-2q7.39-.51,13.55-.51A78.6,78.6,0,0,1,1433.88,99a49.05,49.05,0,0,1,17.87,9.52,42.37,42.37,0,0,1,11.57,16.12Q1467.43,134.4,1467.43,147.58Zm-55.23,39.26q20.22,0,30.18-10.33t10-28.93q0-18.6-10-28.93t-30.18-10.33q-6,0-9.3.15c-2.2.1-3.74.2-4.62.29V186.4q1.32.15,4.62.3T1412.2,186.84Z" />
                <path class="cls-2" d="M1546.09,160.33a48.31,48.31,0,0,1-2.63,16.4,37.51,37.51,0,0,1-7.4,12.6,32.52,32.52,0,0,1-11.35,8.13,37.48,37.48,0,0,1-28.72,0,32.43,32.43,0,0,1-11.35-8.13,37.51,37.51,0,0,1-7.4-12.6,52.26,52.26,0,0,1,0-32.74,37.55,37.55,0,0,1,7.4-12.67,32.55,32.55,0,0,1,11.35-8.13,37.6,37.6,0,0,1,28.72,0,32.65,32.65,0,0,1,11.35,8.13,37.55,37.55,0,0,1,7.4,12.67A48.62,48.62,0,0,1,1546.09,160.33Zm-14.21,0q0-12.9-5.78-20.44t-15.75-7.54q-10,0-15.75,7.54t-5.78,20.44q0,12.88,5.78,20.43t15.75,7.55q10,0,15.75-7.55T1531.88,160.33Z" />
                <path class="cls-2" d="M1591.07,200.17a41.33,41.33,0,0,1-16.19-2.93,32.42,32.42,0,0,1-11.72-8.2,34,34,0,0,1-7.11-12.53,52,52,0,0,1-2.34-16,48.47,48.47,0,0,1,2.56-16.11,38.13,38.13,0,0,1,7.25-12.67,32.41,32.41,0,0,1,11.51-8.35,37.2,37.2,0,0,1,15.16-3,61.23,61.23,0,0,1,10.25.87,47.5,47.5,0,0,1,9.82,2.79l-3.08,11.57a32.23,32.23,0,0,0-7.11-2.34,39.8,39.8,0,0,0-8.56-.88q-11.43,0-17.51,7.17t-6.08,20.95a42.82,42.82,0,0,0,1.39,11.28,23.18,23.18,0,0,0,4.4,8.79,19.48,19.48,0,0,0,7.69,5.64,29.32,29.32,0,0,0,11.42,2,43.5,43.5,0,0,0,9.82-1,36.34,36.34,0,0,0,6.88-2.2l1.91,11.43a14.52,14.52,0,0,1-3.37,1.39,47.25,47.25,0,0,1-5,1.17q-2.79.51-5.93.88A53.75,53.75,0,0,1,1591.07,200.17Z" />
                <path class="cls-2" d="M1643.8,188.6q8.35,0,12.38-2.2a7.42,7.42,0,0,0,4-7,9.36,9.36,0,0,0-4-7.91q-4-2.93-13-6.59-4.4-1.76-8.42-3.59a29.38,29.38,0,0,1-7-4.32,18.69,18.69,0,0,1-4.69-6,19.19,19.19,0,0,1-1.76-8.64q0-10.11,7.47-16t20.36-5.93a58.1,58.1,0,0,1,6.45.36c2.15.24,4.15.54,6,.88s3.49.71,4.9,1.1,2.52.73,3.3,1l-2.49,11.72a34.62,34.62,0,0,0-6.89-2.41,44.36,44.36,0,0,0-11.28-1.25,20.89,20.89,0,0,0-10,2.27,7.54,7.54,0,0,0-4.25,7.11,9.62,9.62,0,0,0,1,4.39,10,10,0,0,0,2.93,3.44,24,24,0,0,0,4.9,2.86c2,.88,4.3,1.81,7,2.78q5.42,2.05,9.66,4a30.32,30.32,0,0,1,7.26,4.62,17.58,17.58,0,0,1,4.61,6.37,23.17,23.17,0,0,1,1.61,9.15q0,10.56-7.84,16t-22.34,5.42q-10.1,0-15.82-1.68a79.08,79.08,0,0,1-7.76-2.57l2.49-11.71q2.34.87,7.47,2.63T1643.8,188.6Z" />
              </svg>
            </a>
          </div>


          <?php if ($document != '') { ?>
            <label class="md-icon md-icon--menu md-header-nav__button" onclick="closeNavBar() " for="drawer"></label>
          <?php } ?>
          <div class="lvl1">
            <?php if ($document == "") { ?>
              <a tabindex="0" value="homepage" href="<?php echo SUPPORT_DOCS_URL ?>"><span class="text">Home</span>
              <?php
            } else { ?>
                <a tabindex="0" value="home" class="menu-indicator"><span class="text">Home</span>
                  <span class="drop-down-arrow">
                    <span class="mobileMenuArrow1Reset"></span>
                    <span class="mobileMenuArrow2Reset"></span>
                  </span>
                  <!-- <span class="solid-background first"></span> -->
                  <span class="selected-background"></span>
                </a>
              <?php

            }

              ?>

              <a tabindex="0" value="api-reference" class="menu-indicator"><span class="text">API Reference</span>
                <span class="drop-down-arrow">
                  <span class="mobileMenuArrow1Reset"></span>
                  <span class="mobileMenuArrow2Reset"></span>
                </span>
                <!-- <span class="solid-background"></span> -->
                <span class="selected-background"></span>
              </a>
              <a tabindex="0" value="libraries" class="menu-indicator"><span class="text">Libraries</span>
                <span class="drop-down-arrow">
                  <span class="mobileMenuArrow1Reset"></span>
                  <span class="mobileMenuArrow2Reset"></span>
                </span>
                <!-- <span class="solid-background first"></span> -->
                <span class="selected-background"></span>
              </a>
              <a tabindex="0" value="quick-start" href="<?php echo SUPPORT_DOCS_URL . 'authentication/overview/' ?>"><span class="text">Quick Start</span>

              </a>
              <a tabindex="0" value="changelog" href="<?php echo API_DOCS_URL . '/changelog/' ?>"><span class="text">Changelog</span>

              </a>
          </div>

          </br>



          <div class="mobile_side_menu">
            <a tabindex="0" id="mobile_side_menu">
              <img src="<?php echo THEME_URL; ?>assets/images/menu-icon.svg" width="4px" alt="menu-icon">
            </a>
          </div>
          <div class="mobile_search">
            <a tabindex="0" id="mobile_search">
              <img src="<?php echo THEME_URL; ?>assets/images/search-icon.svg" width="15px" alt="search-icon">
            </a>
          </div>
          <!-- <div class="mobile_menu">
            <a tabindex="0" id="mobile_menu">
              <img src="<?php echo THEME_URL; ?>assets/images/side-menu-icon.svg" width="15px">
            </a>
          </div> -->
          <div class="hamburger-menu">
            <a tabindex="0" class="hamburger">
              <span class=""></span>
              <span class=""></span>
              <span class=""></span>
            </a>
          </div>



          <div class="custom-algolia-search" style="display: inline-flex;">
            <div class="ToggleNightModecontainer">
              <label for="nightModeToggle">Dark Mode</label>
              </breadCrumbRedirect>
              <label class="switch">
                <input type="checkbox" id="nightModeToggle">
                <span class="slider round"></span>
              </label>
            </div>



            <?php require_once 'search.php'; ?>


          </div>
          <div class="custom-api-menu">
            <div class="account-dropdown top-menu md-header-nav__title">

              <span class="md-flex__ellipsis"><a href="<?php echo $hooks->apply_filters('docs_login_url', 'https://accounts.loginradius.com/auth.aspx?action=login'); ?>" id="authantication">Login</a></span>
            </div>
          </div>
        </div>
      </div>
      <div class="slideouts">
        <div id="home" class="sections-4 without-paragraphs slideUpInst">
          <div class="developers-image">
            <img src="<?php echo THEME_URL; ?>assets/images/menu-home.svg" alt="" />
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'authentication/overview/' ?>">
              <h1>Authentication</h1>
              <p>
                A quick run-through of authentication processes and features offered by the LoginRadius Identity Platform.
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'governance/data-governance-overview/' ?>">
              <h3>Governance</h3>
              <p>
                Discover data storage, security, and compliance features followed and offered by the LoginRadius Identity Platform.
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'integrations/overview/' ?>">
              <h3>Integrations</h3>
              <p>
                Integrate LoginRadius Identity Platform with any third-party software to work seamlessly with your existing application and enhance your productivity.
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'single-sign-on/overview/' ?>">
              <h3>Single Sign On</h3>
              <p>
                Configure seamless authentication of your customers into your application or third-party applications.
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'customer-management/overview/' ?>">
              <h3>Customer Management</h3>
              <p>
                Directly view and manage your customer data with these powerful Customer Management Systems.
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'security/overview/' ?>">
              <h3>Security</h3>
              <p>
                Understand and enable the different LoginRadius Identity Platform security features for your customers.
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'customer-intelligence/overview/' ?>">
              <h3>Customer Intelligence</h3>
              <p>
                Analyze your customer information to gain useful insights, build stronger customer relationship and support your decision-making process.
              </p>
            </a>
          </div>
        </div>

        <div id="api-reference" class="sections-4 without-paragraphs slideUpInst">
          <div class="developers-image">
            <img src="<?php echo THEME_URL; ?>assets/images/apireference-menu.svg" alt="" />
          </div>
          <div>
            <a href="<?php echo API_DOCS_URL . '/v2/getting-started/introduction/' ?>">
              <h3>Getting Started</h3>
              <p>
                Introduction of various implementation methodologies,authenticatin work flows,security best practices,data migration and acceptable use policy
              </p>
            </a>
            <a href="<?php echo API_DOCS_URL . '/v2/admin-console/overview/' ?>">
              <h3>Admin Console</h3>
              <p>
                Explains the configuration required for implementing various
                features,details about team and profile management
              </p>
            </a>
            <a href="<?php echo API_DOCS_URL . '/v2/single-sign-on/overview/' ?>">
              <h3>Single Sign On</h3>
              <p>
                Covers the overview and APIs of SSO
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo API_DOCS_URL . '/v2/customer-identity-api/overview/' ?>">
              <h3>Customer Identity API</h3>
              <p>
                APIs to handle the various flows and functions
              </p>
            </a>
            <a href="<?php echo API_DOCS_URL . '/v2/cloud-directory-api/overview/' ?>">
              <h3>Cloud Directory API</h3>
              <p>
                Using Cloud directory APIs you can retrieve your entire user
                database records and generate an aggregate view
              </p>
            </a>
            <a href="<?php echo API_DOCS_URL . '/v2/integrations/overview/' ?>">
              <h3>Integrations</h3>
              <p>
                Details around multiple third party integrations including
                Webhook and its APIs
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo API_DOCS_URL . '/v2/announcements/facebook-update-reminder/' ?>">
              <h3>Announcements</h3>
              <p>
                From this section you can have the latest information/updates
                about LoginRadius
              </p>
            </a>
            <a href="<?php echo API_DOCS_URL . '/v2/troubleshooting/invalid-request-uri-error/' ?>">
              <h3>Troubleshooting</h3>
              <p>
                You can find answers of commonly asked questions
              </p>
            </a>
          </div>
        </div>

        <div id="libraries" class="sections-4 without-paragraphs slideUpInst">
          <div class="developers-image">
            <img src="<?php echo THEME_URL; ?>assets/images/menu-libraries.svg" alt="" />
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/js-libraries/getting-started/' ?>">
              <h3>JS Libraries</h3>
              <p>
                It covers all the feaures you can implement using LoginRadius
                V2JS
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/mobile-sdk-libraries/overview/' ?>">
              <h3>Mobile SDK Libraries</h3>
              <p>
                Mobile SDKs can help you integrate the LoginRadius features into
                your mobile application
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/command-line-interface/cli/' ?>">
              <h3>LoginRadius CLI</h3>
              <p>
              Experience seamless interaction with LoginRadius APIs through 
              our intuitive CLI tool. Manage accounts, configure authentication,
              and more with ease.
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/identity-experience-framework/overview/' ?>">
              <h3>Identity Experience Framework</h3>
              <p>
                It is a ready-to-use solution provided by LoginRadius here you
                can try Login,Registration etc. without making explicit changes
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/turn-key-plugins/overview/' ?>">
              <h3>Turn Key Plugins</h3>
              <p>
                Turn Key Plugins are built natively for CMS-based platforms
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/identity-orchestration/overview/' ?>">
              <h3>Identity Orchestration</h3>
              <p>
                IO empowers businesses to design and implement identity workflows
              </p>
            </a>
          </div>
          <div>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/sdk-libraries/overview/' ?>">
              <h3>WEB SDK Libraries</h3>
              <p>
                LoginRadius SDKs can be utilized to assist you with integrating
                and simplifying API calls in your native server-side application
              </p>
            </a>
            <a href="<?php echo SUPPORT_DOCS_URL . 'libraries/demos/overview/' ?>">
              <h3>UseCase/Demos</h3>
              <p>
                Various demos are provided in multiple technologies which can
                help you in the basic implementation of LoginRadius with your
                multiple platforms
              </p>
            </a>
          </div>
        </div>
      </div>
      <div class="mobile-background"></div>
      <div class="mega-menu-overlay"></div>
    </nav>
  </header>

  <div class="md-container">
    <main class="md-main">
      <div class="md-main__inner md-grid esp_md-grid" data-md-component="container">

        <script>
          var docsPath = window.location.origin + '/legacy/docs/'
          // console.log("docPath::" + docsPath);
          var baseUrl = "<?php echo SUPPORT_DOCS_URL; ?>";
          // console.log("baseUrl::" + baseUrl);

          function addBreadCrumb(currentUrl, isMenu, isSeoDescription) {
            if (isSeoDescription) {
              generateSeoDescription(currentUrl)
            }
            $('.bread-crumb').empty()
            var jsonHandler = <?php echo json_encode($sections); ?>;

            var apiSchema = jsonQ(jsonHandler),
              name = apiSchema.find('url', function() {
                return this == currentUrl;
              });
            if (name.jsonQ_current.length > 0) {
              var pathFinal = name.jsonQ_current[0].path;
              var finalArray = [];
              pathFinal.forEach(function(element, ind) {
                if (element != 'url') {
                  jsonHandler = jsonHandler[element]
                  if (jsonHandler.hasOwnProperty('basic')) {

                    if (jsonHandler['basic'].length > 0) {

                      finalArray.push({
                        Url: jsonHandler['basic'][0]['url'],
                        title: element

                      })
                    }
                  } else if (!jsonHandler.hasOwnProperty('url')) {
                    finalArray.push({
                      Url: jsonHandler[0]['url'],
                      title: element
                    })
                  }
                  if (jsonHandler.hasOwnProperty('url')) {
                    finalArray.push({
                      CurrentUrl: jsonHandler['url'],
                      title: jsonHandler['title']
                    })
                  }
                }
              });
              var url;
              var slash = '';
              $.each(finalArray, function(k, v) {

                if (!v.hasOwnProperty('CurrentUrl')) {
                  url = v.Url
                }
                if (isMenu) {
                  if (v.hasOwnProperty('CurrentUrl')) {

                    $('.bread-crumb').append('<li>' + v.title + '</li> ')

                  }
                  if (!v.hasOwnProperty('CurrentUrl') && v.title !== 'basic') {

                    $('.bread-crumb').append('<li><a onclick=breadCrumbRedirect("' + v.Url + '") href="JavaScript:void(0);">' + v.title + '</a></li> ')
                  }
                } else {

                  if (v.hasOwnProperty('CurrentUrl') && v.CurrentUrl != url) {

                    $('.bread-crumb').append('<li>' + v.title + '</li> ')

                  }
                  if (!v.hasOwnProperty('CurrentUrl') && v.title !== 'basic') {

                    $('.bread-crumb').append('<li><a onclick=breadCrumbRedirect("' + v.Url + '") href="JavaScript:void(0);">' + v.title + '</a></li>')

                  }
                }
              })
              //  generateTag(currentUrl);
            }


          }
          //This function is used to delete element from array
          function deleteElement(arr, element) {
            var position = arr.indexOf(element);
            if (position === -1) {
              return null;
            }
            return arr.splice(position, 1);
          }
          //This function is used to redirect to breadcrumb url
          function breadCrumbRedirect(url) {
            var redirectUrl = baseUrl + url;
            // console.log("redireurl::"+ redirectUrl);
            addBreadCrumb(url, true, true);
            pageLoad(redirectUrl);

          }
          //load breadcrumb on page load
          $(document).ready(function() {
            // console.log("BASEURL::"+baseUrl);
            var currentUrl = window.location.href.split(baseUrl);
            // console.log("BASEURL::"+baseUrl);

            addBreadCrumb(currentUrl[1], true, false);
            // generateTag(currentUrl[1]);
          });

          function redirectUrl(url) {
            window.location = url
          }
        </script>