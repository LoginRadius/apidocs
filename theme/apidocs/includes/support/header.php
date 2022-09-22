<?php
if (!defined('ROOT_PATH')) {
  header("Location: /");
}
$sidebar = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
$sideMenus = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);
global $hooks;
$hooks->do_action('init');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="The LoginRadius Identity Platform includes comprehensive and developer-friendly support documentation for immediate help.">
  <link rel="shortcut icon" href="<?php echo THEME_URL; ?>assets/images/favicon-lr.png">
  <link rel="icon" href="<?php echo THEME_URL; ?>assets/images/favicon-lr.png" type="image/x-icon">
  <?php docs_enqueue_script("//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"); ?>
  <?php docs_enqueue_script("//code.jquery.com/jquery-migrate-3.4.0.min.js"); ?>


  <script>
    if (window.jQuery) {

      document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700|Roboto+Mono"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Barlow:400,500,700&display=swap"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Inconsolata:400,500,700&display=swap"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="https://fonts.googleapis.com/icon?family=Material+Icons"    rel="stylesheet" type="text/css"%3E'));


    } else {
      document.write(unescape("%3Cscript src='<?php echo THEME_URL; ?>assets/javascripts/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Barlow.css"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Inconsolata.css"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/Material.css"    rel="stylesheet" type="text/css"%3E'));
      document.write(unescape('%3Clink href="<?php echo THEME_URL; ?>assets/stylesheets/fallback/roboto.css"    rel="stylesheet" type="text/css"%3E'));
    }
  </script>
  <script>
    var errorPage = "<?php echo ROOT_PATH . '404'; ?>";
    var rootPath = "<?php echo ROOT_PATH; ?>";
    var apiURL = "<?php echo SUPPORT_DOCS_DOCS_DIR; ?>";
    rootURL = "<?php echo ROOT_URL; ?>";
    <?php


    $pageDir = API_DOC_DIR;

    ?>
    var docPath = "<?php echo $pageDir; ?>";
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
      font-family: "Roboto Mono", "Courier New", Courier, monospace
    }
  </style>
  <?php

  //        docs_enqueue_style(THEME_URL . "assets/stylesheets/application-bc099a55ca.css");
  //        docs_enqueue_style(THEME_URL . "assets/stylesheets/application-02ce7adcc2.palette.css");
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

      <div class="md-flex">

        <div class='md-flex-button' onClick='hideNavBar()'> </div>
        <div class="logo">
          <a href="<?php echo SUPPORT_DOCS_URL; ?>" title="LoginRadius" class=" md-icon md-header-nav__button" style="padding: 0;">
            <svg id="f43e0254-447d-4473-9cbf-b0915b972975" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153.87458 22.30249">
              <defs>
                <style>
                  .a30581c2-4fbf-4195-a378-52cf5a9be8f1 {
                    fill: #2f97d3;
                  }

                  .eacd0cb8-50be-494e-b4eb-8cc10835e74f {
                    fill: #fff;
                  }
                </style>
              </defs>
              <title>Logo</title>
              <g>
                <g>
                  <g>
                    <path class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" d="M2.065,17.80737C1.98,17.7507,0,16.37824,0,14.42343V0H1.53615V14.42343c0,1.149,1.3882,2.1248,1.40079,2.13739Z" />
                    <path class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" d="M9.176,17.83255a5.5207,5.5207,0,0,1-4.34088-1.77539,6.52386,6.52386,0,0,1-1.53615-4.52345A6.39276,6.39276,0,0,1,4.9012,7.06377,5.56223,5.56223,0,0,1,9.176,5.28838a5.57775,5.57775,0,0,1,4.32829,1.71873,6.44047,6.44047,0,0,1,1.53615,4.5266,6.44054,6.44054,0,0,1-1.57392,4.54549A5.60414,5.60414,0,0,1,9.176,17.83255Zm0-11.01746a4.01035,4.01035,0,0,0-3.14784,1.278,4.8734,4.8734,0,0,0-1.20248,3.46263,5.08368,5.08368,0,0,0,1.15211,3.52559,3.93912,3.93912,0,0,0,3.18562,1.25914,3.90393,3.90393,0,0,0,3.14785-1.25914,5.16607,5.16607,0,0,0,1.16785-3.535,5.0198,5.0198,0,0,0-1.14267-3.513A3.98288,3.98288,0,0,0,9.176,6.80564Z" />
                    <path class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" d="M21.03076,22.30249c-1.20248,0-3.14785-.085-3.214-.08814l.06925-1.51411c.01889,0,1.97685.085,3.14785.085a4.84921,4.84921,0,0,0,3.46263-.91288A3.61369,3.61369,0,0,0,25.315,17.203v-.04092a6.46614,6.46614,0,0,1-.72086.31478,7.904,7.904,0,0,1-2.74177.34941,5.54248,5.54248,0,0,1-4.23071-1.65262,6.29374,6.29374,0,0,1-1.5267-4.49512,6.25113,6.25113,0,0,1,1.74076-4.6116A6.02815,6.02815,0,0,1,22.24583,5.3293c.57606,0,2.682.10073,3.88444.16054l.7303.03463V7.6713s-.02833,8.85489-.02833,9.53168a5.02589,5.02589,0,0,1-1.25914,3.73964C24.18805,22.30249,22.28675,22.30249,21.03076,22.30249ZM22.24583,6.84342a4.48568,4.48568,0,0,0-3.33672,1.29376,4.7392,4.7392,0,0,0-1.28117,3.54448,4.87758,4.87758,0,0,0,1.11748,3.46263,4.0108,4.0108,0,0,0,3.10063,1.1647,6.55693,6.55693,0,0,0,2.23183-.26127,5.151,5.151,0,0,0,.532-.24238,1.25915,1.25915,0,0,0,.70512-1.12379c0-2.01147,0-4.898.01574-6.50974a1.25913,1.25913,0,0,0-1.22136-1.25914C23.143,6.8686,22.49451,6.84342,22.24583,6.84342Z" />
                    <path class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" d="M41.07939,17.62479H39.54325V10.97654c0-2.14683-.39349-2.9999-.724-3.33672a3.59492,3.59492,0,0,0-2.65993-.79326h-.07555a21.30374,21.30374,0,0,0-2.20349.255,1.25913,1.25913,0,0,0-1.08915,1.25914v9.26411H31.26126V5.5528s3.86556-.2235,4.8225-.2235h.11647A5.10432,5.10432,0,0,1,39.921,6.58844c.79011.80585,1.15526,2.20349,1.15526,4.407Z" />
                    <g>
                      <rect class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" x="28.21414" y="5.5528" width="1.53615" height="12.07199" />
                      <path class="a30581c2-4fbf-4195-a378-52cf5a9be8f1" d="M28.96019-.022a1.02934,1.02934,0,0,0-.77437.31478,1.001,1.001,0,0,0-.31479.76178,1.01047,1.01047,0,0,0,.31479.76493,1.03879,1.03879,0,0,0,.77437.31478h1.09545V1.05768A1.001,1.001,0,0,0,29.74085.2959,1.02931,1.02931,0,0,0,28.96019-.022Z" />
                    </g>
                  </g>
                  <g>
                    <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M79.5744,17.81681h-.11647a5.11153,5.11153,0,0,1-3.7239-1.25914c-.787-.809-1.15211-2.22868-1.15211-4.47309V5.5528h1.53615v6.53178c0,2.20349.39348,3.28635.724,3.62317a3.58636,3.58636,0,0,0,2.65679.79326h.07555a21.24261,21.24261,0,0,0,2.20349-.255,1.25913,1.25913,0,0,0,1.086-1.25913V5.54336h1.5393V17.62479S80.53135,17.81681,79.5744,17.81681Z" />
                    <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M52.88382,17.83255a4.31255,4.31255,0,0,1-2.89917-.94435,3.63783,3.63783,0,0,1-1.13323-2.83307,3.70817,3.70817,0,0,1,1.51412-3.11007,6.51794,6.51794,0,0,1,3.9474-1.06082,9.15405,9.15405,0,0,1,2.257.27386A3.27361,3.27361,0,0,0,55.89,7.90739a4.5741,4.5741,0,0,0-3.29895-1.07027c-1.1584,0-2.4081.04092-2.42069.04407l-.05351-1.51726s1.29062-.04407,2.4742-.04407A6.16238,6.16238,0,0,1,56.97916,6.834c1.13638,1.12379,1.13638,2.89288,1.13638,3.84352V17.6059l-.71771.04722C57.2908,17.672,54.87955,17.83255,52.88382,17.83255Zm1.448-6.43105a5.07367,5.07367,0,0,0-3.02194.75548,2.20353,2.20353,0,0,0-.92231,1.92019,2.67436,2.67436,0,0,0,.60753,1.85723,2.83306,2.83306,0,0,0,1.88871.56346c.81214,0,1.71243-.02833,2.48679-.05981a1.25913,1.25913,0,0,0,1.22766-1.25913V12.73619a1.25913,1.25913,0,0,0-1.0923-1.25914,7.93569,7.93569,0,0,0-1.18674-.07555Z" />
                    <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M64.96525,17.83255A5.35138,5.35138,0,0,1,60.936,16.18623a6.50845,6.50845,0,0,1-1.47319-4.48254,6.38483,6.38483,0,0,1,1.66836-4.56752A5.58116,5.58116,0,0,1,65.365,5.3293a11.23171,11.23171,0,0,1,2.36718.21406,8.63411,8.63411,0,0,1,.894.25182v-5.77h1.53615V17.62479S65.9883,17.83255,64.96525,17.83255Zm.39978-10.986a4.045,4.045,0,0,0-3.10693,1.3158A4.92886,4.92886,0,0,0,60.999,11.70054a5.0827,5.0827,0,0,0,1.07657,3.46263A3.98516,3.98516,0,0,0,64.96525,16.501c.56032,0,1.51727-.03148,2.43329-.06925a1.25914,1.25914,0,0,0,1.22765-1.25914V8.31346a1.25912,1.25912,0,0,0-.94435-1.21821c-.09444-.02834-.18887-.05037-.28016-.06926A9.63544,9.63544,0,0,0,65.365,6.84657Z" />
                    <g>
                      <rect class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" x="71.56314" y="5.5528" width="1.53615" height="12.07199" />
                      <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M73.03.33682a1.03878,1.03878,0,0,0-1.45745,0,.94435.94435,0,0,0-.31479.72086.94433.94433,0,0,0,.31479.72085.96638.96638,0,0,0,.7303.31479h1.04194V1.05768A.94435.94435,0,0,0,73.03.33682Z" />
                    </g>
                    <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M47.55136,5.3293H47.4349c-.94436,0-4.82565.22665-4.82565.22665V17.62479h1.53929V8.34809A1.25914,1.25914,0,0,1,45.2377,7.089a21.116,21.116,0,0,1,2.20349-.255h.07555c.554,0,.92232-.02518,1.39135.01889V5.3293A10.75252,10.75252,0,0,0,47.55136,5.3293Z" />
                    <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M93.94747,14.63748c-.08813,2.1248-1.65577,3.17933-4.47938,3.17933-1.63689,0-3.7428-.20146-3.7428-.20146V15.97847a13.72393,13.72393,0,0,0,3.66724.31478c1.28747,0,2.83306-.277,2.99361-1.66206.39033-3.50041-6.8088-.69567-6.8088-5.71964,0-1.71243,1.14267-3.343,4.36291-3.34616,1.28432,0,3.6578.11332,3.6578.11332V7.32819a12.41278,12.41278,0,0,0-3.46263-.31479c-1.25914,0-2.95583.52884-2.93694,1.85723C87.25515,12.327,94.16468,9.31133,93.94747,14.63748Z" />
                  </g>
                </g>
                <rect class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" x="105.66697" y="0.069" width="0.58745" height="22.16495" />
                <g>
                  <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M128.57452,11.59235a7.202,7.202,0,0,1-.50261,2.80818,5.193,5.193,0,0,1-1.41755,1.97375,6.005,6.005,0,0,1-2.1888,1.16624,9.61808,9.61808,0,0,1-2.79951.38586q-.75325,0-1.65951-.06272a9.80635,9.80635,0,0,1-1.64216-.24241V5.56324a9.853,9.853,0,0,1,1.64216-.24219q.90537-.06271,1.65951-.06272a9.63315,9.63315,0,0,1,2.79951.38564,6.0121,6.0121,0,0,1,2.1888,1.16645,5.19654,5.19654,0,0,1,1.41755,1.97376A7.20283,7.20283,0,0,1,128.57452,11.59235Zm-6.7648,4.80884a4.91631,4.91631,0,0,0,3.6962-1.265,4.89431,4.89431,0,0,0,1.2205-3.54386,4.895,4.895,0,0,0-1.2205-3.54385,4.91631,4.91631,0,0,0-3.6962-1.265q-.7359,0-1.13955.018t-.56488.0358v9.51q.16146.018.56488.03581Q121.07382,16.40153,121.80972,16.40119Z" />
                  <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M138.21,13.15334a5.90279,5.90279,0,0,1-.32292,2.00978,4.60329,4.60329,0,0,1-.906,1.5432,3.99311,3.99311,0,0,1-1.39086.99588,4.59454,4.59454,0,0,1-3.517,0,3.98333,3.98333,0,0,1-1.39041-.99588,4.59586,4.59586,0,0,1-.906-1.5432,5.89194,5.89194,0,0,1-.32336-2.00978,5.91489,5.91489,0,0,1,.32336-2.00066,4.58346,4.58346,0,0,1,.906-1.55209,3.98348,3.98348,0,0,1,1.39041-.99589,4.59466,4.59466,0,0,1,3.517,0,3.99326,3.99326,0,0,1,1.39086.99589,4.5908,4.5908,0,0,1,.906,1.55209A5.92583,5.92583,0,0,1,138.21,13.15334Zm-1.74046,0a4.01325,4.01325,0,0,0-.709-2.503,2.4751,2.4751,0,0,0-3.85765,0,4.01325,4.01325,0,0,0-.70855,2.50305,4.01264,4.01264,0,0,0,.70855,2.50328,2.4751,2.4751,0,0,0,3.85765,0A4.01264,4.01264,0,0,0,136.46953,13.15334Z" />
                  <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M143.7187,18.034a5.08042,5.08042,0,0,1-1.98287-.35873,3.98678,3.98678,0,0,1-1.43578-1.005,4.16922,4.16922,0,0,1-.87-1.53408,6.35472,6.35472,0,0,1-.28734-1.96485,5.94812,5.94812,0,0,1,.314-1.97376,4.66269,4.66269,0,0,1,.88825-1.55209,3.98676,3.98676,0,0,1,1.40865-1.02279,4.55726,4.55726,0,0,1,1.857-.36784,7.411,7.411,0,0,1,1.25609.10764,5.80418,5.80418,0,0,1,1.20226.34093l-.37673,1.41754a4.03263,4.03263,0,0,0-.87-.28711,4.91606,4.91606,0,0,0-1.04971-.10764,2.654,2.654,0,0,0-2.14432.87913,3.87214,3.87214,0,0,0-.74458,2.566,5.25836,5.25836,0,0,0,.17035,1.38173,2.84775,2.84775,0,0,0,.5382,1.07662,2.39758,2.39758,0,0,0,.94206.69075,3.599,3.599,0,0,0,1.39975.24219,5.29874,5.29874,0,0,0,1.20227-.12565,4.37912,4.37912,0,0,0,.84332-.2691l.23307,1.39953a1.74336,1.74336,0,0,1-.41277.17058,5.83488,5.83488,0,0,1-.6098.14344q-.34159.06271-.72679.10764A6.48286,6.48286,0,0,1,143.7187,18.034Z" />
                  <path class="eacd0cb8-50be-494e-b4eb-8cc10835e74f" d="M150.17838,16.61647a3.28491,3.28491,0,0,0,1.51629-.2691.9106.9106,0,0,0,.49327-.86133,1.14422,1.14422,0,0,0-.48438-.969,7.688,7.688,0,0,0-1.59724-.8073q-.53841-.21549-1.03146-.43967a3.61109,3.61109,0,0,1-.85266-.5293,2.31025,2.31025,0,0,1-.57423-.73568,2.35562,2.35562,0,0,1-.21527-1.05882,2.37626,2.37626,0,0,1,.91537-1.96464,3.903,3.903,0,0,1,2.49394-.72678,7.01173,7.01173,0,0,1,.7895.04492q.395.0447.73568.10764.34094.063.60135.13455.25955.07171.40343.12565l-.30468,1.43534a4.242,4.242,0,0,0-.84332-.296,5.45588,5.45588,0,0,0-1.382-.15256,2.55032,2.55032,0,0,0-1.22006.27821.92182.92182,0,0,0-.52041.87023,1.18559,1.18559,0,0,0,.11654.5382,1.241,1.241,0,0,0,.35894.42166,2.93593,2.93593,0,0,0,.60136.35q.35827.16146.86111.34093.66385.25152,1.18448.49349a3.7217,3.7217,0,0,1,.88824.56511,2.1733,2.1733,0,0,1,.56488.7806,2.82868,2.82868,0,0,1,.19749,1.12132,2.22577,2.22577,0,0,1-.95986,1.956,4.77833,4.77833,0,0,1-2.73634.66385,7.15614,7.15614,0,0,1-1.938-.20639,9.97577,9.97577,0,0,1-.951-.314l.30468-1.43533q.28689.10741.91538.32291A5.28295,5.28295,0,0,0,150.17838,16.61647Z" />
                </g>
              </g>
            </svg>
          </a>
        </div>


        <?php if ($document != '') { ?>
          <label class="md-icon md-icon--menu md-header-nav__button" onclick="closeNavBar() " for="drawer"></label>
        <?php } ?>


        <!-- Adding New Top Navigation Section -->


        <?php
        if (isset($sidebar)) {
          $menucount = 0;

          foreach ($sidebar as $name => $sidebar) {
            global $menucount;
            $menucount++;

            if (isset($sidebar['basic'][0]['url'])) { ?>

              <div class="top-menu md-header-nav__title"><a href="<?php echo SUPPORT_DOCS_URL . '/' . $sidebar['basic'][0]['url']; ?>"><?php echo ucwords($name); ?></a></div>


            <?php } else if ((isset($sidebar['Getting Started'][0]['url']))) { ?>

              <div class="top-menu md-header-nav__title"> <a href="<?php echo SUPPORT_DOCS_URL . '/' . $sidebar['Getting Started'][0]['url']; ?>"><?php echo ucwords($name); ?></a></div>
            <?php   } else if ((isset($sidebar['Infrastructure'][0]['url']))) { ?>

              <div class="top-menu md-header-nav__title"> <a href="<?php echo SUPPORT_DOCS_URL . '/' . $sidebar['Infrastructure'][0]['url']; ?>"><?php echo ucwords($name); ?></a></div>
        <?php   }
          }
        } ?>



        <!-- <div class = "md-flex__cell">
        <div class="md-header-nav__title" style="line-height: 5.6rem;font-size: 1.4rem;  float: left;
  overflow: hidden;">
        <button class="dropbtn">More
      <i class="fa fa-caret-down"></i>
        </button>
            
            <div class="dropdown-container">

            </div>
     
        </div>
    </div> -->


        <!-- <div class="top-menu md-header-nav__title"><a>All Docs</a></div> -->

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



          <?php require_once 'search.php'; ?>



        </div>
        <div class="custom-api-menu">
          <!--                        <nav class="md-nav md-nav--primary">-->
          <div class="account-dropdown top-menu md-header-nav__title">
            <span class="md-flex__ellipsis"><a href="<?php echo $hooks->apply_filters('docs_login_url', 'https://accounts.loginradius.com/auth.aspx?action=login'); ?>" id="authantication">Login</a></span>
          </div>
          <!--                        </nav>-->
        </div>
      </div>
    </nav>
  </header>

  <div class="md-container">
    <main class="md-main">
      <div class="md-main__inner md-grid esp_md-grid" data-md-component="container">

        <script>
          var docsPath = window.location.origin + '/docs/api/'
          var baseUrl = "<?php echo SUPPORT_DOCS_URL . '/'; ?>";

          function addBreadCrumb(currentUrl, isMenu) {

            $('.bread-crumb').empty()
            var jsonHandler = <?php echo json_encode($sidebar); ?>;

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
                    $('.bread-crumb').append('<a   href="JavaScript:void(0);">&nbsp' + v.title + '&nbsp;</a> ')
                    slash = '>&nbsp;&nbsp;';
                  }
                  if (!v.hasOwnProperty('CurrentUrl') && v.title !== 'basic') {
                    $('.bread-crumb').append('<a onclick=breadCrumbRedirect("' + v.Url + '") href="JavaScript:void(0);">&nbsp;' + v.title + '&nbsp;></a> ')
                  }
                } else {
                  if (v.hasOwnProperty('CurrentUrl') && v.CurrentUrl != url) {
                    slash = '>&nbsp;&nbsp;';
                    $('.bread-crumb').append('<a  href="JavaScript:void(0);">&nbsp;' + slash + v.title + '&nbsp;</a> ')

                  }
                  if (!v.hasOwnProperty('CurrentUrl') && v.title !== 'basic') {
                    $('.bread-crumb').append('<a onclick=breadCrumbRedirect("' + v.Url + '") href="JavaScript:void(0);">&nbsp;' + slash + v.title + '&nbsp;</a> ')
                    slash = '>&nbsp;&nbsp;';
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
            addBreadCrumb(url);
            pageLoad(redirectUrl);

          }
          //load breadcrumb on page load
          $(document).ready(function() {
            var currentUrl = window.location.href.split(baseUrl);

            addBreadCrumb(currentUrl[1]);
            // generateTag(currentUrl[1]);
          });

          function redirectUrl(url) {
            window.location = url
          }
        </script>