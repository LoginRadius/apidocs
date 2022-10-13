<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
?>

<footer class="md-footer">

    <?php if ($is_documentPage || $is_apiPage || $is_supportPage) { ?>
        <div class="md-footer-nav">
            <nav class="md-footer-nav__inner md-grid">
                <a href="" title="" class="md-flex md-footer-nav__link md-footer-nav__link--prev" rel="prev">
                    <div class="md-flex__cell md-flex__cell--shrink">
                        <i class="md-icon md-icon--arrow-back md-footer-nav__button"></i>
                    </div>
                    <div class="md-flex__cell md-flex__cell--stretch md-footer-nav__title">
                        <span class="md-flex__ellipsis"></span>
                    </div>
                </a>
                <a href="" title="" class="md-flex md-footer-nav__link md-footer-nav__link--next" rel="next">
                    <div class="md-flex__cell md-flex__cell--stretch md-footer-nav__title">
                        <span class="md-flex__ellipsis"></span>
                    </div>
                    <div class="md-flex__cell md-flex__cell--shrink">
                        <i class="md-icon md-icon--arrow-forward md-footer-nav__button"></i>
                    </div>
                </a>
            </nav>
        </div>
    <?php } ?>

    <div class="md-footer-meta md-typeset">
        <div class="md-footer-meta__inner md-grid">

             <?php docs_enqueue_style(THEME_URL . "assets/stylesheets/font-awesome.min.css");?>
            <div class="md-footer-copyright__highlight">
                <a href="https://www.loginradius.com/terms" target="_blank">Terms</a> | 
                <a href="https://www.loginradius.com/privacy" target="_blank">Privacy</a> |
                <a href="https://www.loginradius.com/contact-sales/" target="_blank">Contact</a>
             
               <p class="copyright-policy">  ©Copyright <?php echo Date('Y'); ?> LoginRadius Inc.</p>  
                     
            </div>

        </div>
    </div>

    <script type="text/javascript">
(function(e,t){var n=e.amplitude||{_q:[],_iq:{}};var r=t.createElement("script")
;r.type="text/javascript"
;r.integrity="sha384-JuTNYkgKcv1YWHTHxD083VG16UGvE0QIORVstsbIKtGUBrB1ldQRU9eyEZEreszu"
;r.crossOrigin="anonymous";r.async=true
;r.src="https://cdn.amplitude.com/libs/amplitude-6.0.0-min.gz.js"
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
;var d=["init","logEvent","logRevenue","setUserId","setUserProperties","setOptOut","setVersionName","setDomain","setDeviceId","enableTracking","setGlobalUserProperties","identify","clearUserProperties","setGroup","logRevenueV2","regenerateDeviceId","groupIdentify","onInit","logEventWithTimestamp","logEventWithGroups","setSessionId","resetSessionId"]
;function v(e){function t(t){e[t]=function(){
e._q.push([t].concat(Array.prototype.slice.call(arguments,0)))}}
for(var n=0;n<d.length;n++){t(d[n])}}v(n);n.getInstance=function(e){
e=(!e||e.length===0?"$default_instance":e).toLowerCase()
;if(!n._iq.hasOwnProperty(e)){n._iq[e]={_q:[]};v(n._iq[e])}return n._iq[e]}
;e.amplitude=n})(window,document);
if(window.location.host == 'www.loginradius.com') {
var ampAPIKey = "5eb0251ba269777d9c9f913759d67370";
}
else {
var ampAPIKey = "89d02d04126f3fba6a3a11c0145f9eaa";
}
amplitude.getInstance().init(ampAPIKey);
amplitude.getInstance().logEvent(window.location.pathname); 
</script>

</footer>
