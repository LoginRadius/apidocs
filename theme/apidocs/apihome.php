<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
$sections = json_decode(file_get_contents(API_MENU_DIR .'v2.json'), true);
$blocksdescription = json_decode(file_get_contents(API_MENU_DIR .'menuv2.json'), true);
require_once 'includes/header.php';
?>

<!--
<style>
	.esp_md-grid{
        margin-left: 0 !important;
        margin-right: 0 !important;
        max-width: 100% !important;
        margin-top: -5.6rem !important;
	}
    .csscalc .md-main__inner {
        padding-right: 0rem;
        padding-left: 0rem;
    }
    .scrollTop{
        display: none !important;
    }
</style>
-->

<div class="close-overlay"></div>

<div class="skywrap">

    <div class="banner not-full-width-section">

        <div class="landing-grid">
            <div class="hero_banner-api">
                <div class="imagefield box">
                    <img class="stars" src="<?php echo THEME_URL; ?>/assets/images/rocket/stars.svg">
                    <img class="cloud" src="<?php echo THEME_URL; ?>/assets/images/rocket/cloudSmall.svg">
                    <img  class="rocket" style="max-width: 310px" src="<?php echo THEME_URL; ?>/assets/images/rocket/rocket.svg">
                    <img class="cloud" src="<?php echo THEME_URL; ?>/assets/images/rocket/cloudBig.svg">
                </div>
                <div class="textfield box">
                    <h1>LoginRadius API Documentation</h1>
                    
                    <p>
                    Learn how to implement the LoginRadius Identity Platform for your application. Get the comprehensive guide including quick-starts, implementation tutorials, example code, features and more.
                    </p>
                    
                    <p>
                    You can find everything from SDKs in your favorite languages to APIs and sample demos using various technologies.
                    </p>
                    
                </div>
                  
            </div>
        </div>

    </div>
    
    
    
    
    
    <!-- <div class ="not-full-width-section implementation-logos margin-bottom--lg">
        
        <div>
            <div>

                <h2>LoginRadius Implementation Methods</h2>

            </div>

            <div>
                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/mobile-SDKs/android-library/' ?>">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 345 345" style="enable-background:new 0 0 345 345;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:#A4C639;}
                    </style>
                    <g>
                        <path class="st0" d="M311.9,135c0-11.2-9.2-20.4-20.4-20.4s-20.4,9.2-20.4,20.4v85c0,11.2,9.2,20.4,20.4,20.4s20.4-9.2,20.4-20.4
                            V135z"/>
                        <path class="st0" d="M73.9,135c0-11.2-9.2-20.4-20.4-20.4s-20.4,9.2-20.4,20.4v85c0,11.2,9.2,20.4,20.4,20.4s20.4-9.2,20.4-20.4
                            V135z"/>
                        <path class="st0" d="M217.1,37.8l14.4-26c0.8-1.4,0.3-3.2-1.1-3.9c-0.4-0.2-0.9-0.4-1.4-0.4c-1,0-2,0.5-2.5,1.5l-14.6,26.3
                            C200,30,186.6,27,172.5,27c-14.1,0-27.5,3-39.4,8.3L118.6,9c-0.8-1.4-2.5-1.9-3.9-1.1c-1.4,0.8-1.9,2.5-1.1,3.9l14.4,26
                            c-27.6,14.4-46.3,41.7-46.4,73.1h182C263.5,79.5,244.8,52.2,217.1,37.8z M130.5,77.6c-4.2,0-7.6-3.4-7.6-7.6s3.4-7.6,7.6-7.6
                            s7.6,3.4,7.6,7.6S134.7,77.6,130.5,77.6z M214.5,77.6c-4.2,0-7.6-3.4-7.6-7.6s3.4-7.6,7.6-7.6s7.6,3.4,7.6,7.6
                            S218.7,77.6,214.5,77.6z"/>
                        <path class="st0" d="M81.5,118.1V250c0,12.2,9.8,22,22,22h14.6v45c0,11.2,9.2,20.4,20.4,20.4s20.4-9.2,20.4-20.4v-45h27.2v45
                            c0,11.2,9.2,20.4,20.4,20.4s20.4-9.2,20.4-20.4v-45h14.6c12.2,0,22-9.8,22-22V118.1H81.5z"/>
                    </g>
                    </svg>


                    <p>Android</p>
                </a>

                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/mobile-SDKs/ios-library/' ?>">

                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 196 196" style="enable-background:new 0 0 196 196;" xml:space="preserve">
                    <style type="text/css">
                        .st0iiii{fill-rule:evenodd;clip-rule:evenodd;fill:url(#SVGID_1_);stroke:#D9D9D9;}
                        .st1iiii{fill-rule:evenodd;clip-rule:evenodd;fill:url(#SVGID_2_);}
                        .st2iiii{fill-rule:evenodd;clip-rule:evenodd;fill:url(#SVGID_3_);}
                        .st3iiii{fill-rule:evenodd;clip-rule:evenodd;fill:url(#SVGID_4_);}
                    </style>
                    <g>

                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-856.0618" y1="636.2268" x2="-856.0618" y2="635.7523" gradientTransform="matrix(194 0 0 -194 166174 123526)">
                            <stop  offset="0" style="stop-color:#FFFFFF"/>
                            <stop  offset="1" style="stop-color:#E9E5E5"/>
                        </linearGradient>
                        <path class="st0iiii" d="M48.6,5.9h98.7c23.6,0,42.7,19.1,42.7,42.7v98.7c0,23.6-19.1,42.7-42.7,42.7H48.6c-23.6,0-42.7-19.1-42.7-42.7
                            V48.6C5.9,25.1,25.1,5.9,48.6,5.9z"/>

                            <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="-738.2704" y1="633.6533" x2="-738.2704" y2="632.8271" gradientTransform="matrix(7.0722 0 0 -82.8937 5255.1846 52582.7266)">
                            <stop  offset="0" style="stop-color:#0339F1"/>
                            <stop  offset="1" style="stop-color:#01ADE5"/>
                        </linearGradient>
                        <path class="st1iiii" d="M36.2,135.5h-4.3V77.7h4.3V135.5z M34,63.5c-1.8,0-3.3-1.4-3.3-3.3c0-1.9,1.5-3.3,3.3-3.3
                            c1.9,0,3.4,1.4,3.4,3.3C37.3,62,35.8,63.5,34,63.5z"/>

                            <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-849.0052" y1="633.6355" x2="-848.4397" y2="633.0109" gradientTransform="matrix(72.81 0 0 -84.087 61869.2031 53345.2383)">
                            <stop  offset="0" style="stop-color:#0756EE"/>
                            <stop  offset="0.3745" style="stop-color:#00A3F5"/>
                            <stop  offset="0.7171" style="stop-color:#18B5B6"/>
                            <stop  offset="1" style="stop-color:#80DF43"/>
                        </linearGradient>
                        <path class="st2iiii" d="M78.3,136.7c-21.2,0-34.6-15.4-34.6-39.9c0-24.4,13.4-39.9,34.6-39.9s34.5,15.5,34.5,39.9
                            C112.8,121.2,99.4,136.7,78.3,136.7z M78.3,60.8c-18.4,0-30.2,13.9-30.2,35.9c0,22,11.8,36,30.2,36c18.4,0,30.2-14,30.2-36
                            C108.5,74.7,96.7,60.8,78.3,60.8L78.3,60.8z"/>

                            <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="-846.0438" y1="633.6852" x2="-845.3449" y2="632.8528" gradientTransform="matrix(57.9167 0 0 -84.0801 49121.9375 53340.8281)">
                            <stop  offset="0" style="stop-color:#20BBA6"/>
                            <stop  offset="0.4988" style="stop-color:#9BEC23"/>
                            <stop  offset="1" style="stop-color:#D9EF35"/>
                        </linearGradient>
                        <path class="st3iiii" d="M143.7,136.7c-15.9,0-27.3-9-27.9-21.8h4.2c0.6,10.5,10.5,17.9,24,17.9c13.2,0,22.3-7.5,22.3-17.6
                            c0-8.1-5.5-12.8-18.5-16.1l-9.2-2.3c-14.3-3.7-20.9-9.5-20.9-19.2c0-12.1,11.3-20.8,25.4-20.8c14.6,0,25.5,8.6,26,20H165
                            c-0.6-9.3-9.7-16.1-21.9-16.1c-11.7,0-21,7-21,16.8c0,7.7,5.7,12.2,18.2,15.3l8.7,2.2c15,3.7,21.7,9.5,21.7,19.8
                            C170.7,127.7,159.9,136.7,143.7,136.7L143.7,136.7z"/>
                    </g>
                    </svg>



                    <p>iOS</p>
                </a>

                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/web-SDKs/node-js-library/' ?>">

                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                    <style type="text/css">
                        .st0nnnnnnnsfsdfsdfsdf{fill:#689F63;}
                        .st1nnnnnnnsfsdfsdfsdf{fill:#404137;}
                        .st2nnnnnnnsfsdfsdfsdf{clip-path:url(#SVGID_2nnnnnn_);fill:url(#SVGID_3nnnnnn_);}
                        .st3nnnnnnnsfsdfsdfsdf{clip-path:url(#SVGID_5nnnnnn_);fill:url(#SVGID_6nnnnnn_);}
                        .st4nnnnnnnsfsdfsdfsdf{clip-path:url(#SVGID_8nnnnnn_);fill:url(#SVGID_9nnnnnn_);}
                    </style>
                    <g>
                        <path class="st0nnnnnnnsfsdfsdfsdf" d="M247.3,394.5c-1.6,0-3.1-0.4-4.5-1.2l-14.2-8.4c-2.1-1.2-1.1-1.6-0.4-1.9c2.8-1,3.4-1.2,6.4-2.9
                            c0.3-0.2,0.7-0.1,1.1,0.1l10.9,6.5c0.4,0.2,1,0.2,1.3,0l42.6-24.6c0.4-0.2,0.7-0.7,0.7-1.2v-49.2c0-0.5-0.3-0.9-0.7-1.2L248,286
                            c-0.4-0.2-0.9-0.2-1.3,0L204,310.6c-0.4,0.2-0.7,0.7-0.7,1.2v49.2c0,0.5,0.3,0.9,0.7,1.1l11.7,6.7c6.3,3.2,10.2-0.6,10.2-4.3v-48.5
                            c0-0.7,0.5-1.2,1.2-1.2h5.4c0.7,0,1.2,0.5,1.2,1.2v48.6c0,8.5-4.6,13.3-12.6,13.3c-2.5,0-4.4,0-9.8-2.7l-11.2-6.4
                            c-2.8-1.6-4.5-4.6-4.5-7.8v-49.2c0-3.2,1.7-6.2,4.5-7.8l42.7-24.6c2.7-1.5,6.3-1.5,9,0l42.6,24.6c2.8,1.6,4.5,4.6,4.5,7.8v49.2
                            c0,3.2-1.7,6.2-4.5,7.8l-42.6,24.6C250.4,394.1,248.9,394.5,247.3,394.5"/>
                        <path class="st0nnnnnnnsfsdfsdfsdf" d="M260.5,360.6c-18.7,0-22.6-8.6-22.6-15.7c0-0.7,0.6-1.2,1.2-1.2h5.5c0.6,0,1.1,0.4,1.2,1
                            c0.8,5.6,3.3,8.4,14.6,8.4c9,0,12.8-2,12.8-6.8c0-2.7-1.1-4.8-15-6.1c-11.7-1.2-18.9-3.7-18.9-13.1c0-8.6,7.3-13.7,19.4-13.7
                            c13.6,0,20.4,4.7,21.3,14.9c0,0.4-0.1,0.7-0.3,0.9c-0.2,0.2-0.6,0.4-0.9,0.4h-5.5c-0.6,0-1.1-0.4-1.2-1c-1.3-5.9-4.6-7.8-13.3-7.8
                            c-9.8,0-10.9,3.4-10.9,6c0,3.1,1.3,4,14.6,5.8c13.1,1.7,19.3,4.2,19.3,13.4C281.7,355.4,273.9,360.7,260.5,360.6 M312.3,308.5h1.4
                            c1.2,0,1.4-0.8,1.4-1.3c0-1.3-0.9-1.3-1.3-1.3h-1.5L312.3,308.5z M310.6,304.5h3.2c1.1,0,3.2,0,3.2,2.4c0,1.7-1.1,2-1.7,2.3
                            c1.3,0.1,1.4,0.9,1.5,2.1c0.1,0.7,0.2,2,0.5,2.4h-2c-0.1-0.4-0.4-2.8-0.4-2.9c-0.1-0.5-0.3-0.8-1-0.8h-1.6v3.7h-1.8V304.5z
                             M306.8,309.1c0,3.8,3.1,6.9,6.9,6.9c3.8,0,6.9-3.2,6.9-6.9c0-3.8-3.1-6.9-6.9-6.9C309.9,302.2,306.8,305.2,306.8,309.1
                             M321.9,309.1c0,4.5-3.7,8.2-8.2,8.2c-4.5,0-8.2-3.6-8.2-8.2c0-4.7,3.8-8.2,8.2-8.2C318.1,300.9,321.9,304.5,321.9,309.1"/>
                        <path class="st1nnnnnnnsfsdfsdfsdf" d="M115.3,202.1c0-2-1-3.8-2.7-4.7l-45.2-26c-0.8-0.4-1.6-0.7-2.5-0.7h-0.5c-0.9,0-1.7,0.3-2.5,0.7l-45.2,26
                            c-1.7,1-2.7,2.8-2.7,4.7l0.1,70c0,1,0.5,1.9,1.4,2.4c0.8,0.5,1.9,0.5,2.7,0L45,259.1c1.7-1,2.7-2.8,2.7-4.7v-32.7
                            c0-2,1-3.8,2.7-4.7l11.4-6.6c0.8-0.5,1.8-0.7,2.7-0.7c0.9,0,1.9,0.2,2.7,0.7l11.4,6.6c1.7,1,2.7,2.8,2.7,4.7v32.7
                            c0,1.9,1,3.7,2.7,4.7l26.8,15.4c0.8,0.5,1.9,0.5,2.7,0c0.8-0.5,1.4-1.4,1.4-2.4L115.3,202.1z M328.5,238.5c0,0.5-0.3,0.9-0.7,1.2
                            l-15.5,8.9c-0.4,0.2-0.9,0.2-1.4,0l-15.5-8.9c-0.4-0.2-0.7-0.7-0.7-1.2v-17.9c0-0.5,0.3-0.9,0.7-1.2l15.5-9c0.4-0.2,0.9-0.2,1.4,0
                            l15.5,9c0.4,0.2,0.7,0.7,0.7,1.2L328.5,238.5z M332.7,105.8c-0.8-0.5-1.9-0.5-2.7,0c-0.8,0.5-1.3,1.4-1.3,2.4v69.4
                            c0,0.7-0.4,1.3-1,1.7c-0.6,0.3-1.3,0.3-1.9,0l-11.3-6.5c-1.7-1-3.8-1-5.5,0l-45.2,26.1c-1.7,1-2.7,2.8-2.7,4.7v52.2
                            c0,2,1,3.7,2.7,4.7l45.2,26.1c1.7,1,3.8,1,5.5,0l45.2-26.1c1.7-1,2.7-2.8,2.7-4.7V125.6c0-2-1.1-3.8-2.8-4.8L332.7,105.8z
                             M483.3,220.1c1.7-1,2.7-2.8,2.7-4.7v-12.7c0-1.9-1-3.7-2.7-4.7L438.4,172c-1.7-1-3.8-1-5.5,0l-45.2,26.1c-1.7,1-2.7,2.8-2.7,4.7
                            V255c0,2,1.1,3.8,2.8,4.7l44.9,25.6c1.7,0.9,3.7,1,5.4,0l27.2-15.1c0.9-0.5,1.4-1.4,1.4-2.4s-0.5-1.9-1.4-2.4l-45.5-26.1
                            c-0.9-0.5-1.4-1.4-1.4-2.4v-16.4c0-1,0.5-1.9,1.4-2.4l14.1-8.2c0.8-0.5,1.9-0.5,2.7,0l14.2,8.2c0.8,0.5,1.4,1.4,1.4,2.4v12.9
                            c0,1,0.5,1.9,1.4,2.4c0.8,0.5,1.9,0.5,2.7,0L483.3,220.1z"/>
                        <path class="st0nnnnnnnsfsdfsdfsdf" d="M435,217.7c0.3-0.2,0.7-0.2,1,0l8.7,5c0.3,0.2,0.5,0.5,0.5,0.9v10c0,0.4-0.2,0.7-0.5,0.9l-8.7,5
                            c-0.3,0.2-0.7,0.2-1,0l-8.7-5c-0.3-0.2-0.5-0.5-0.5-0.9v-10c0-0.4,0.2-0.7,0.5-0.9L435,217.7z"/>
                        <g>
                            <defs>
                                <path id="SVGID_1nnnnnn_" d="M185.5,172.2l-45,25.9c-1.7,1-2.7,2.8-2.7,4.7v51.9c0,1.9,1,3.7,2.7,4.7l45,26c1.7,1,3.8,1,5.4,0l44.9-26
                                    c1.7-1,2.7-2.8,2.7-4.7v-51.9c0-1.9-1-3.7-2.7-4.7l-44.9-25.9c-0.8-0.5-1.8-0.7-2.7-0.7C187.3,171.5,186.3,171.8,185.5,172.2"/>
                            </defs>
                            <clipPath id="SVGID_2nnnnnn_">
                                <use xlink:href="#SVGID_1nnnnnn_"  style="overflow:visible;"/>
                            </clipPath>

                                <linearGradient id="SVGID_3nnnnnn_" gradientUnits="userSpaceOnUse" x1="0.2969" y1="3.256068e-02" x2="1.0971" y2="3.256068e-02" gradientTransform="matrix(-81.162 165.5699 -165.5699 -81.162 250.1612 116.2246)">
                                <stop  offset="0" style="stop-color:#3E863D"/>
                                <stop  offset="0.3" style="stop-color:#3E863D"/>
                                <stop  offset="0.5" style="stop-color:#55934F"/>
                                <stop  offset="0.8" style="stop-color:#5AAD45"/>
                                <stop  offset="1" style="stop-color:#5AAD45"/>
                            </linearGradient>
                            <polygon class="st2nnnnnnnsfsdfsdfsdf" points="284,193.8 157.3,131.7 92.4,264.2 219.1,326.3 		"/>
                        </g>
                        <g>
                            <defs>
                                <path id="SVGID_4nnnnnn_" d="M138.9,258.1c0.4,0.6,1,1,1.6,1.4l38.6,22.3l6.4,3.7c1,0.6,2.1,0.8,3.1,0.7c0.4,0,0.7-0.1,1.1-0.2
                                    l47.4-86.8c-0.4-0.4-0.8-0.7-1.3-1l-29.4-17l-15.6-9c-0.4-0.3-0.9-0.4-1.4-0.6L138.9,258.1z"/>
                            </defs>
                            <clipPath id="SVGID_5nnnnnn_">
                                <use xlink:href="#SVGID_4nnnnnn_"  style="overflow:visible;"/>
                            </clipPath>

                                <linearGradient id="SVGID_6nnnnnn_" gradientUnits="userSpaceOnUse" x1="-8.650561e-02" y1="6.678537e-02" x2="0.7137" y2="6.678537e-02" gradientTransform="matrix(147.809 -109.2133 109.2133 147.809 134.3817 253.3567)">
                                <stop  offset="0" style="stop-color:#3E863D"/>
                                <stop  offset="0.57" style="stop-color:#3E863D"/>
                                <stop  offset="0.72" style="stop-color:#619857"/>
                                <stop  offset="1" style="stop-color:#76AC64"/>
                            </linearGradient>
                            <polygon class="st3nnnnnnnsfsdfsdfsdf" points="84.2,212.1 173.6,333.2 291.9,245.8 202.4,124.8 		"/>
                        </g>
                        <g>
                            <defs>
                                <path id="SVGID_7nnnnnn_" d="M187.7,171.5c-0.8,0.1-1.5,0.3-2.2,0.7l-44.8,25.9l48.3,88c0.7-0.1,1.3-0.3,1.9-0.7l45-26
                                    c1.4-0.8,2.3-2.2,2.6-3.7l-49.3-84.2c-0.4-0.1-0.7-0.1-1.1-0.1C188,171.5,187.8,171.5,187.7,171.5"/>
                            </defs>
                            <clipPath id="SVGID_8nnnnnn_">
                                <use xlink:href="#SVGID_7nnnnnn_"  style="overflow:visible;"/>
                            </clipPath>

                                <linearGradient id="SVGID_9nnnnnn_" gradientUnits="userSpaceOnUse" x1="-7.264868e-02" y1="0.2444" x2="0.7276" y2="0.2444" gradientTransform="matrix(122.2438 0 0 122.2438 149.5464 198.9629)">
                                <stop  offset="0" style="stop-color:#6BBF47"/>
                                <stop  offset="0.16" style="stop-color:#6BBF47"/>
                                <stop  offset="0.38" style="stop-color:#79B461"/>
                                <stop  offset="0.47" style="stop-color:#75AC64"/>
                                <stop  offset="0.7" style="stop-color:#659E5A"/>
                                <stop  offset="0.9" style="stop-color:#3E863D"/>
                                <stop  offset="1" style="stop-color:#3E863D"/>
                            </linearGradient>
                            <rect x="140.7" y="171.5" class="st4nnnnnnnsfsdfsdfsdf" width="97.8" height="114.6"/>
                        </g>
                    </g>
                    </svg>



                    <p>Node.js</p>
                </a>

                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/web-SDKs/php-library/' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path fill="#6181B6" d="M64 33.039c-33.74 0-61.094 13.862-61.094 30.961s27.354 30.961 61.094 30.961 61.094-13.862 61.094-30.961-27.354-30.961-61.094-30.961zm-15.897 36.993c-1.458 1.364-3.077 1.927-4.86 2.507-1.783.581-4.052.461-6.811.461h-6.253l-1.733 10h-7.301l6.515-34h14.04c4.224 0 7.305 1.215 9.242 3.432 1.937 2.217 2.519 5.364 1.747 9.337-.319 1.637-.856 3.159-1.614 4.515-.759 1.357-1.75 2.624-2.972 3.748zm21.311 2.968l2.881-14.42c.328-1.688.208-2.942-.361-3.555-.57-.614-1.782-1.025-3.635-1.025h-5.79l-3.731 19h-7.244l6.515-33h7.244l-1.732 9h6.453c4.061 0 6.861.815 8.402 2.231s2.003 3.356 1.387 6.528l-3.031 15.241h-7.358zm40.259-11.178c-.318 1.637-.856 3.133-1.613 4.488-.758 1.357-1.748 2.598-2.971 3.722-1.458 1.364-3.078 1.927-4.86 2.507-1.782.581-4.053.461-6.812.461h-6.253l-1.732 10h-7.301l6.514-34h14.041c4.224 0 7.305 1.215 9.241 3.432 1.935 2.217 2.518 5.418 1.746 9.39zM95.919 54h-5.001l-2.727 14h4.442c2.942 0 5.136-.29 6.576-1.4 1.442-1.108 2.413-2.828 2.918-5.421.484-2.491.264-4.434-.66-5.458-.925-1.024-2.774-1.721-5.548-1.721zM38.934 54h-5.002l-2.727 14h4.441c2.943 0 5.136-.29 6.577-1.4 1.441-1.108 2.413-2.828 2.917-5.421.484-2.491.264-4.434-.66-5.458s-2.772-1.721-5.546-1.721z"/></svg>

                    <p>PHP</p>
                </a>

                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/web-SDKs/java-library/' ?>">

                    <svg version="1.1" id="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 240 240" style="enable-background:new 0 0 240 240;" xml:space="preserve">
                    <style type="text/css">
                        .st0jjjjjjjjjjjjjjjjjjjjjjjjjj{fill-rule:evenodd;clip-rule:evenodd;fill:#0074BD;}
                        .st1jjjjjjjjjjjjjjjjjjjjjjjjjj{fill-rule:evenodd;clip-rule:evenodd;fill:#EA2D2E;}
                    </style>
                    <title>java-color</title>
                    <g>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M99.5,126c0,0-6.2,3.7,3.7,5c12.4,1.2,18.7,1.2,32.4-1.2c0,0,3.7,2.5,8.7,3.7C114.5,147.2,75.9,133.5,99.5,126
                            L99.5,126z"/>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M95.8,109.8c0,0-6.2,5,3.7,6.2c12.4,1.2,23.6,1.2,41.1-2.5c0,0,2.5,2.5,6.2,3.7
                            C110.7,128.5,69.7,118.6,95.8,109.8L95.8,109.8z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M126.9,81.2c7.5,8.7-2.5,16.2-2.5,16.2s18.7-10,10-22.4c-7.5-11.2-13.7-17.4,18.7-36.1
                            C154.3,38.9,102,52.6,126.9,81.2L126.9,81.2z"/>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M166.7,138.5c0,0,3.7,3.7-5,6.2c-17.4,5-72.2,7.5-87.1,0c-5-2.5,5-6.2,7.5-6.2c3.7-1.2,5,0,5,0
                            c-5-3.7-38.6,8.7-16.2,12.4C131.9,160.9,182.9,145.9,166.7,138.5L166.7,138.5z"/>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M102,92.4c0,0-27.4,6.2-10,8.7c7.5,1.2,22.4,1.2,37.3,0c11.2-1.2,23.6-2.5,23.6-2.5s-3.7,1.2-7.5,3.7
                            c-28.6,7.5-83.4,3.7-67.2-3.7C92.1,91.2,102,92.4,102,92.4L102,92.4z"/>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M153,119.8c28.6-14.9,14.9-29.9,6.2-27.4c-2.5,0-3.7,1.2-3.7,1.2s1.2-1.2,2.5-2.5
                            C176.7,85,190.4,111.1,153,119.8C151.8,121,153,121,153,119.8L153,119.8z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M135.6,7.8c0,0,16.2,16.2-14.9,41.1c-24.9,19.9-6.2,31.1,0,43.6C105.7,78.7,95.8,67.5,102,56.3
                            C112,40.2,141.8,32.7,135.6,7.8L135.6,7.8z"/>
                        <path class="st0jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M105.7,160.9c27.4,1.2,69.7-1.2,70.9-13.7c0,0-2.5,5-22.4,8.7c-23.6,5-52.3,3.7-69.7,1.2
                            C83.3,157.1,87.1,159.6,105.7,160.9L105.7,160.9z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M100.8,210.6c-2.5,2.5-5,3.7-7.5,3.7c-3.7,0-5-2.5-5-5c0-3.7,2.5-6.2,10-6.2h2.5V210.6L100.8,210.6
                            L100.8,210.6z M108.2,219.4v-24.9c0-6.2-3.7-11.2-12.4-11.2c-5,0-10,1.2-13.7,2.5l1.2,5c2.5-1.2,6.2-2.5,10-2.5
                            c5,0,7.5,2.5,7.5,6.2v3.7h-2.5c-12.4,0-17.4,5-17.4,12.4c0,6.2,3.7,10,11.2,10c5,0,7.5-1.2,11.2-5v3.7L108.2,219.4L108.2,219.4z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M131.9,219.4h-8.7L112,184.5h7.5l6.2,21.2l1.2,6.2c3.7-10,6.2-18.7,7.5-28.6h7.5
                            C140.6,195.7,136.8,208.2,131.9,219.4L131.9,219.4z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M166.7,210.6c-2.5,2.5-5,3.7-7.5,3.7c-3.7,0-5-2.5-5-5c0-3.7,2.5-6.2,10-6.2h2.5V210.6L166.7,210.6
                            L166.7,210.6z M174.2,219.4v-24.9c0-6.2-3.7-11.2-12.4-11.2c-5,0-10,1.2-13.7,2.5l1.2,5c2.5-1.2,6.2-2.5,10-2.5
                            c5,0,7.5,2.5,7.5,6.2v3.7h-2.5c-12.4,0-17.4,5-17.4,12.4c0,6.2,3.7,10,11.2,10c5,0,7.5-1.2,11.2-5v3.7L174.2,219.4L174.2,219.4z"/>
                        <path class="st1jjjjjjjjjjjjjjjjjjjjjjjjjj" d="M72.1,225.6c-2.5,2.5-5,5-8.7,6.2l-3.7-3.7c2.5-1.2,5-3.7,6.2-6.2c1.2-2.5,1.2-3.7,1.2-10v-39.8h7.5v39.8
                            C74.6,219.4,74.6,221.8,72.1,225.6L72.1,225.6z"/>
                    </g>
                    </svg>


                    <p>Java</p>
                </a>

                <a href="<?php echo API_DOCS_URL . '/v2/authentication/tutorial/web-SDKs/html5-library/' ?>">
                    <svg version="1.0" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
                    <g>
                        <path d="M67.3,94.1c-3.3,0-5.9,2.6-5.9,5.9s2.6,5.9,5.9,5.9c3.3,0,5.9-2.6,5.9-5.9S70.6,94.1,67.3,94.1z"/>
                        <path d="M132.7,94.1c-3.3,0-5.9,2.6-5.9,5.9s2.6,5.9,5.9,5.9c3.3,0,5.9-2.6,5.9-5.9S135.9,94.1,132.7,94.1z"/>
                        <path d="M100,94.1c-3.3,0-5.9,2.6-5.9,5.9s2.6,5.9,5.9,5.9s5.9-2.6,5.9-5.9S103.3,94.1,100,94.1z"/>
                    </g>
                    </svg>



                    <p>More</p>
                </a>

            </div>
            
        </div>
    </div> -->
    
    
    
    
    <div class="home-start not-full-width-section">
        <div class="landing-grid three-per-row">
        <?php
        if (isset($sections)) {
   
            foreach ($sections as $name => $section) {
               
                if (isset($section['basic'][0]['url'])) {
                    ?>
                    <div class="start-block">
                        <a href="<?php echo API_DOCS_URL . '/' . $section['basic'][0]['url']; ?>"> 
                            <div class="icon">
                            <img class="icon-svg" src="<?php echo THEME_URL.$blocksdescription[$name]['imagepath']; ?>">
                            <?php// echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); ?>                     
                            </div>
                            
                            <div class="text">
                                <h2>
                                    <?php echo ucwords($name); ?>
                                </h2>
                                
                                <p> <?php echo $blocksdescription[$name]['description'] ; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                }else if(isset($section['Getting Started'][0]['url']))
				{ 
					?>
						<div class="start-block">
							<a href="<?php echo API_DOCS_URL . '/' . $section['Getting Started'][0]['url']; ?>">
                                <div class="icon">
                                <img class="icon-svg" src="<?php echo THEME_URL.$blocksdescription[$name]['imagepath']; ?>">
                                <?php// echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); ?>  
                                </div>
                                
                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>
                                    
                                   <p> <?php echo $blocksdescription[$name]['description'] ; ?></p>
                                </div>
                            </a>
						</div>
                    <?php
					
				}else if(isset($section['JS Libraries'][0]['url']))
				{ 
					?>
						<div class="start-block">
							<a href="<?php echo API_DOCS_URL . '/' . $section['JS Libraries'][0]['url']; ?>">
                                <div class="icon">
                                <img class="icon-svg" src="<?php echo THEME_URL.$blocksdescription[$name]['imagepath']; ?>">
                                <?php //echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); ?>  
                                </div>
                                
                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>
                                    
                                    <p> <?php echo $blocksdescription[$name]['description'] ; ?></p>
                                </div>
                            </a>
						</div>
                    <?php
					
				}else if(isset($section['Infrastructure'][0]['url']))
				{ 
					?>
						<div class="start-block">
							<a href="<?php echo API_DOCS_URL . '/' . $section['Infrastructure'][0]['url']; ?>">
                                <div class="icon">
                                <img class="icon-svg" src="<?php echo THEME_URL.$blocksdescription[$name]['imagepath']; ?>">
                                <?php// echo file_get_contents(THEME_URL.$blocksdescription[$name]['imagepath'],true); ?>  
                                </div>
                                
                                <div class="text">
                                    <h2>
                                        <?php echo ucwords($name); ?>
                                    </h2>
                                    
                                    <p> <?php echo $blocksdescription[$name]['description'] ; ?></p>
                                </div>
                            </a>
						</div>
                    <?php
					
				}
            
        }
    
    }
        
        ?>
        </div>
                
       <!-- <div class="see-all">  
            <a href="<?php echo API_DOCS_URL; ?>">
                See All Docs
            </a>
        </div> -->
    </div>

    <div class="other-links">
        <div>
            <div class="link-block">
                <a href="https://status.loginradius.com" target="_blank">
                    <div class="icon status-icon">
                    <img src="<?php echo THEME_URL.'assets/images/apihome-statuspage.svg'; ?>">

                    </div>
                    <div class="content">
                        <h3>Status Page</h3>
                        <p>Real-time status updates and system metrics</p>
                    </div>
                </a>
             </div>

             <div class="link-block">
                <a href="https://blog.loginradius.com" target="_blank">
                    <div class="icon engineering-blog-icon">
                    <img src="<?php echo THEME_URL.'assets/images/apihome-blog.svg'; ?>">

                    </div>
                    <div class="content">
                        <h3>Engineering Blog</h3>
                        <p>News, Industry Insights, and Customer Spotlights</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    
    
<?php require_once 'includes/footerContent.php'; ?>
    
<?php require_once 'includes/footer.php'; ?>
</body>
<script>
konamiCodePosition=0;
function Zoom(){    
    $(".rocket").animate({
        left:"+=1000",
        top:"-=1000"
    },2e3,function(){
        $(".rocket").animate({
            left: "-=3000"
        },100,function(){
            $(".rocket").animate({
                top: "+=3000"
            },100,function(){
                $(".rocket").animate({
                    left:"+=2000",
                    top:"-=2000"
                },2e3,function(){
                    konamiCodePosition=0;
                })
            })
        })
    }),
    $("#rocket").animate({
        top:"+=300"
    },1e3)}
    var allowedKeys={37:"left",38:"up",39:"right",40:"down",65:"a",66:"b"},
    konamiCode=["up","up","down","down","left","right","left","right","b","a"];
    document.addEventListener("keydown",function(keyPressed){
        if (allowedKeys[keyPressed.keyCode]==konamiCode[konamiCodePosition]){
            if (konamiCodePosition == 9){
                Zoom();
            }
            konamiCodePosition++;
        }
    });
</script>

</html>