<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$sidebar = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'sidebar.json'), true);


$blocksdescription = json_decode(file_get_contents(SUPPORT_DOCS_MENU_DIR . 'menuv2.json'), true);
require_once 'includes/support_header.php';
?>
<div class="close-overlay"></div>
<script type="text/javascript" async="" src="<?php echo ROOT_URL;?>theme/apidocs/assets/javascripts/snowstorm.js"></script>
<div class="skywrap">

    <div class="banner">
        <div class="not-full-width-section">
            <div class="landing-grid">
                <div class="hero_banner-api">
                    <div class="imagefield box">
                    <img class="rocket" style="max-width: 565px" src="<?php echo THEME_URL; ?>/assets/images/santa.svg">
                    <!--img class="stars" src="<?php echo THEME_URL; ?>/assets/images/rocket/rocket-annimations.svg" alt="Rocket Animation"-->
                    <!--img class="rocket" style="max-width: 565px" src="<?php echo THEME_URL; ?>/assets/images/HNY.svg"-->
                    <!--img class="stars" style="width: 565px !important" src="<?php echo THEME_URL; ?>/assets/images/spring-theme.svg" alt="Spring Theme"-->
                    <!--img class="stars" style="max-width: 565px" src="<?php echo THEME_URL; ?>/assets/images/autumn-theme.svg" alt="Autumn Theme"-->
                    <!--img class="stars" style="max-width: 565px;" src="<?php echo THEME_URL; ?>/assets/images/halloween-theme.svg" alt="Halloween Theme"-->
                    </div>
                    <div class="textfield box">
                        <h1 style="font-size:41px;">Identity Platform Documents</h1>

                        <p>
                            Learn how to implement the <b>LoginRadius Identity Platform</b> for your application. Get the comprehensive guide including quick-starts, implementation tutorials, example code, features and more.
                        </p>

                        <p>
                            You can find everything from SDKs in your favorite languages to APIs and sample demos using various technologies.
                        </p>
                        <a href="<?php echo SUPPORT_DOCS_URL . 'authentication/quick-start/standard-login/' ?>" class="btn btn-get-started" style="text-transform:none;font-weight:700;"><i class="fa fa-rocket"></i>GET STARTED</a>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="home-start not-full-width-section">
        <div class="landing-grid three-per-row">
            <?php
            if (isset($sidebar)) {

                foreach ($sidebar as $name => $sidebar) {

                    if (isset($sidebar['basic'][0]['url'])) {
            ?>
                        <div class="start-block">
                            <a href="<?php echo SUPPORT_DOCS_URL . $sidebar['basic'][0]['url']; ?>">

                                <div class="icon">
                                    <img class="icon-svg" src="<?php echo THEME_URL . $blocksdescription[$name]['imagepath']; ?>" alt="<?php echo ucwords($name); ?>">
                                    <?php //echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); 
                                    ?>
                                </div>

                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>

                                    <p> <?php echo $blocksdescription[$name]['description']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php
                    } else if (isset($sidebar['Getting Started'][0]['url'])) {
                    ?>
                        <div class="start-block">
                            <a href="<?php echo SUPPORT_DOCS_URL . $sidebar['Getting Started'][0]['url']; ?>">
                                <div class="icon">
                                    <img class="icon-svg" src="<?php echo THEME_URL . $blocksdescription[$name]['imagepath']; ?>">
                                    <?php //echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); 
                                    ?>
                                </div>

                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>

                                    <p> <?php echo $blocksdescription[$name]['description']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php

                    } else if (isset($sidebar['JS Libraries'][0]['url'])) {
                    ?>
                        <div class="start-block">
                            <a href="<?php echo SUPPORT_DOCS_URL . $sidebar['JS Libraries'][0]['url']; ?>">
                                <div class="icon">
                                    <img class="icon-svg" src="<?php echo THEME_URL . $blocksdescription[$name]['imagepath']; ?>">
                                    <?php //echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); 
                                    ?>
                                </div>

                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>

                                    <p> <?php echo $blocksdescription[$name]['description']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php

                    } else if (isset($sidebar['Infrastructure'][0]['url'])) {
                    ?>
                        <div class="start-block">
                            <a href="<?php echo SUPPORT_DOCS_URL . $sidebar['Infrastructure'][0]['url']; ?>">
                                <div class="icon">
                                    <img class="icon-svg" src="<?php echo THEME_URL . $blocksdescription[$name]['imagepath']; ?>">
                                    <?php //echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); 
                                    ?>
                                </div>

                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>

                                    <p> <?php echo $blocksdescription[$name]['description']; ?></p>
                                </div>
                            </a>
                        </div>
            <?php

                    }
                }
            }

            ?>
        </div>


    </div>

    <div class="other-links">
        <div>
            <div class="link-block">
                <a href="https://status.loginradius.com" target="_blank">
                    <div class="icon status-icon">
                        <img src="<?php echo THEME_URL . 'assets/images/apihome-statuspage.svg'; ?>" alt="line chart">

                    </div>
                    <div class="content">
                        <h3>Status Page</h3>
                        <p>Real-time status updates and system metrics</p>
                    </div>
                </a>
            </div>

            <div class="link-block">
                <a href="https://www.loginradius.com/engineering/" target="_blank">
                    <div class="icon engineering-blog-icon">
                        <img src="<?php echo THEME_URL . 'assets/images/apihome-blog.svg'; ?>" alt="Engineer block">

                    </div>
                    <div class="content">
                        <h3>Engineering Blog</h3>
                        <p>News, Industry Insights, and Customer Spotlights</p>
                    </div>
                </a>
            </div>
        </div>
    </div>





    </body>
    <script>
        konamiCodePosition = 0;

        function Zoom() {
            $(".rocket").animate({
                    left: "+=1000",
                    top: "-=1000"
                }, 2e3, function() {
                    $(".rocket").animate({
                        left: "-=3000"
                    }, 100, function() {
                        $(".rocket").animate({
                            top: "+=3000"
                        }, 100, function() {
                            $(".rocket").animate({
                                left: "+=2000",
                                top: "-=2000"
                            }, 2e3, function() {
                                konamiCodePosition = 0;
                            })
                        })
                    })
                }),
                $("#rocket").animate({
                    top: "+=300"
                }, 1e3)
        }
        var allowedKeys = {
                37: "left",
                38: "up",
                39: "right",
                40: "down",
                65: "a",
                66: "b"
            },
            konamiCode = ["up", "up", "down", "down", "left", "right", "left", "right", "b", "a"];
        document.addEventListener("keydown", function(keyPressed) {
            if (allowedKeys[keyPressed.keyCode] == konamiCode[konamiCodePosition]) {
                if (konamiCodePosition == 9) {
                    Zoom();
                }
                konamiCodePosition++;
            }
        });
    </script>

    <script src="<?php echo THEME_URL; ?>assets/javascripts/navigation.js" type="text/javascript"></script>

    <script type="text/javascript">
  (function(e,t){var n=e.amplitude||{_q:[],_iq:{}};var r=t.createElement("script")
  ;r.type="text/javascript"
  ;r.integrity="sha384-35+p+zAMRt40eCQKk1/Xowd25miK7ZUBRbn6ikyGdVMfY6iKSyDDJwxFc9z4+HhF"
  ;r.crossOrigin="anonymous";r.async=true
  ;r.src="https://cdn.amplitude.com/libs/amplitude-6.0.1-min.gz.js"
  ;r.onload=function(){if(!e.amplitude.runQueuedFunctions){
  console.log("[Amplitude] Error: could not load SDK")}}
  ;var i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)
  ;function s(e,t){e.prototype[t]=function(){
  this._q.push([t].concat(Array.prototype.slice.call(arguments,0)));return this}}
  var o=function(){this._q=[];return this}
  ;var a=["add","append","clearAll","prepend","set","setOnce","unset"]
  ;for(var u=0;u<a.length;u++){s(o,a[u])}n.Identify=o;var c=function(){this._q=[]
  ;return this}
  ;var l=["setProductId","setQuantity","setPrice","setRevenueType","setEventProperties"]
  ;for(var p=0;p<l.length;p++){s(c,l[p])}n.Revenue=c
  ;var d=["init","logEvent","logRevenue","setUserId","setUserProperties","setOptOut","setVersionName","setDomain","setDeviceId", "enableTracking", "setGlobalUserProperties","identify","clearUserProperties","setGroup","logRevenueV2","regenerateDeviceId","groupIdentify","onInit","logEventWithTimestamp","logEventWithGroups","setSessionId","resetSessionId"]
  ;function v(e){function t(t){e[t]=function(){
  e._q.push([t].concat(Array.prototype.slice.call(arguments,0)))}}
  for(var n=0;n<d.length;n++){t(d[n])}}v(n);n.getInstance=function(e){
  e=(!e||e.length===0?"$default_instance":e).toLowerCase()
  ;if(!n._iq.hasOwnProperty(e)){n._iq[e]={_q:[]};v(n._iq[e])}return n._iq[e]}
  ;e.amplitude=n})(window,document);

  amplitude.getInstance().init("89d02d04126f3fba6a3a11c0145f9eaa");
  amplitude.getInstance().logEvent('landing page');
</script>


    </html>

    <?php require_once 'includes/footerContent.php'; ?>
    <?php require_once 'includes/footer.php'; ?>