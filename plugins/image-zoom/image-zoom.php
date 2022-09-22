<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;

$hooks->add_action('docs_head_script', 'imageZoomScript', 10, 0);
$hooks->add_action('docs_footer_script', 'imageZoomScriptCall', 10, 0);

function imageZoomScript() {
    docs_enqueue_script(PLUGIN_URL . "image-zoom/assets/js/photoswipe.min.js");
    docs_enqueue_script(PLUGIN_URL . "image-zoom/assets/js/photoswipe-ui-default.min.js");
    docs_enqueue_style(PLUGIN_URL . "image-zoom/assets/css/photoswipe.min.css");
    docs_enqueue_style(PLUGIN_URL . "image-zoom/assets/css/default-skin.min.css");
}

function imageZoomScriptCall() {
    ?>
    <style>
        .hello-slide {
            width: 100%;
            max-width: 400px;
            color: #FFF;
            margin: 120px auto 0;
            text-align: center;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        h1 {
            font-weight: normal;
        }
        .hello-slide a {
            color: #B5AEF7 !important;
        }
    </style>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe. 
             It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <div class="pswp__container">
                <!-- don't modify these 3 pswp__item elements, data is added later on -->
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>   
    <script type="text/javascript">
        function imageZoom() {
            jQuery("#content img, #mdcontainer img").click(function () {
                var pswpElement = document.querySelectorAll('.pswp')[0];
                var items = [];
                var count = 0;
                var thisIndex = 0;
                var thisSrc = jQuery(this).attr('src');
		        jQuery("#content img, #mdcontainer img").each(function () {
			        var xSize= jQuery(this)[0].clientWidth;
			        var ySize= jQuery(this)[0].clientHeight;
                    items[count] = {
                        src: jQuery(this).attr('src'),
                        w: xSize * 1.9,
                        h: ySize * 1.9 
                    };
                    if (items[count].src == thisSrc){
                        thisIndex = count;
                    }
                    count++;
                });
                var options = {
                    index: thisIndex,
                    history: false,
                    focus: false,
                    showAnimationDuration: 0,
                    hideAnimationDuration: 0,
                    captionEl: false,
                    fullscreenEl: false,
                    shareEl: false,
                    bgOpacity: 0.90,
                    tapToClose: true,
					preloaderEl: true,
                    tapToToggleControls: false
                };
                var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                gallery.init();
				jQuery('.pswp__button--zoom').click();
            });
        }
    </script>
    <?php

}
