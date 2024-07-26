<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;

$hooks->add_action('docs_head_script', 'algoliaSearchScript', 10, 0);
$hooks->add_action('docs_footer_script', 'algoliaSearchScriptCall', 10, 0);
$hooks->add_action('docs_searching', 'algoliaSearchHTML');

function algoliaSearchScript() {
    docs_enqueue_style(PLUGIN_URL . "algolia-search/assets/css/docsearch.min.css");
    docs_enqueue_script(PLUGIN_URL . "algolia-search/assets/js/docsearch.min.js");

}



function algoliaSearchScriptCall() {
    ?>
    <script type="text/javascript">
        docsearch({
            apiKey: 'a46a1c39a5e8523102b2bdd05ebeffb8',
            appId: 'Z5ZYP9YXTO',
            indexName: 'loginradius',
            inputSelector: '#algoliasearch',
            debug: false,
            autocompleteOptions: {
                autoselect: false
            }
        });
    </script>
    <?php
}

function algoliaSearchHTML($searchType) {
    ?><style>
        .md-header  .algolia-autocomplete{
        width: calc(100% - 68px);
    }
    .md-header .algolia-autocomplete .ds-dropdown-menu:before{
        display: none !important;
    }
.md-header .algolia-autocomplete {
    vertical-align: top;
}

.md-header #algolia-autocomplete-listbox-0{
    box-shadow: 0 2px 5px rgba(0,0,0,.26);
    margin-top: 9px;
    margin-left: -44px;
}

.md-header #algolia-autocomplete-listbox-0:before{
    content: unset;
}

.md-header #algolia-autocomplete-listbox-0 .algolia-autocomplete .ds-dropdown-menu [class^=ds-dataset-]{
    border: 0px solid transparent
}
        
        
        
        
        
        
        .md-header #algolia-autocomplete-listbox-0{font-size:2em;width:100%}
        <?php
        if ($searchType == 'support') {
            ?>.algolia-autocomplete {
                width: 115%;
            }
            <?php
        } else {
            ?>
            
            <?php
        }
        ?>
    </style>
    <input id="algoliasearch" type="text" placeholder="Search"></input>
    <?php
}
