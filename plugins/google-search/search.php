<?php

if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;
$hooks->add_action('docs_footer_script', 'googleSearchScript', 10, 0);
$hooks->add_action('docs_searching', 'googleSearchHTML');

function googleSearchScript() {
    ?>
    <script>
        (function () {
            var cx = "015904667965127092467:vkkdqujvmo8";
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
    <?php

}

function googleSearchHTML($searchType) {

    if ($searchType == 'support') {
        echo '<img src="' . PLUGIN_URL . 'google-search/images/icon-search.png"/><style>.gsc-results-wrapper-overlay {
    left: auto;
    max-width: 65%;
}#___gcse_0 {
    float: left;
    width: 85%;
}.search img {
    float: left;
    padding: 20px 0px 20px 20px;
}.gsc-control-cse {
    background: transparent;
    border: 0px;
    margin: 0;
    padding: 0 10px;
}.gsc-search-button,.gsc-clear-button {
    display: none;
}input.gsc-input{border: 0px !important;padding: 8px 6px !important;background:#f5f7f9 !important;}
input.gsc-input:before{
    content: "Enter your number";
}</style>';
    }
    echo '<gcse:search></gcse:search>';
}
