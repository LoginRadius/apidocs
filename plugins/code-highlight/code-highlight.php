<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;

$hooks->add_action('docs_head_script', 'codeHighlightScript', 10, 0);
$hooks->add_action('docs_footer_script', 'codeHighlightScriptCall', 10, 0);

function codeHighlightScript()
{
    docs_enqueue_script(PLUGIN_URL . "code-highlight/assets/highlight.min.js");
}

function codeHighlightScriptCall()
{
?>
    <style>
        pre a.codeCopyIcon {
            position: absolute;
            display: block;

            top: 12px;
            right: 12px;

            margin: 0;

            background-color: #008ecf;
            border-radius: 3px;

            cursor: pointer;
            z-index: 1;
        }

        pre a.codeCopyIcon:before {
            content: "COPY";
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;

            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;

            justify-content: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;

            width: 70px;
            height: 25px;
            font-weight: 600;
            color: white;
        }

        pre a.codeCopyIcon:hover {
            background-color: #3fa7e2;
        }



        /*code highlighter*/
        .hljs {
            display: block;
            overflow-x: auto;

            padding: 0.5em;

            color: white;
        }

        .hljs * {
            color: white;
        }

        .hljs javascript {
            color: white;
        }

        .hljs-tag {
            color: white;
        }

        .hljs,
        .hljs-subst {
            color: #444;
        }

        .hljs-comment {
            color: #888888;
        }

        .hljs-keyword,
        .hljs-attribute,
        .hljs-selector-tag,
        .hljs-meta-keyword,
        .hljs-doctag,
        .hljs-name {
            color: white;
            font-weight: bold;
        }

        .hljs-attr {
            color: white;
            font-weight: 400;
        }

        .hljs-type,
        .hljs-string,
        .hljs-number,
        .hljs-selector-id,
        .hljs-selector-class,
        .hljs-quote,
        .hljs-template-tag,
        .hljs-deletion {
            color: #008ecf;
        }

        .hljs-title,
        .hljs-section {
            color: #008ecf;
            font-weight: bold;
        }

        .hljs-regexp,
        .hljs-symbol,
        .hljs-variable,
        .hljs-template-variable,
        .hljs-link,
        .hljs-selector-attr,
        .hljs-selector-pseudo {
            color: #9b708b;
        }

        .hljs-literal {
            color: #e27a7a;
        }

        .hljs-built_in,
        .hljs-bullet,
        .hljs-code,
        .hljs-addition {
            color: rgba(255, 255, 255, .50);
        }

        .hljs-meta {
            color: #248fb2;
        }

        .hljs-meta-string {
            color: #4d99bf;
        }

        .hljs-emphasis {
            font-style: italic;
        }

        .hljs-strong {
            font-weight: bold;
        }


        /*code highlighter*/
    </style>
<?php
    /*
<script type="text/javascript">
        setTimeout(function () {
            jQuery('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
                jQuery(this).parent().prepend('<a class="codeCopyIcon"></a>');
            });
            jQuery(".codeCopyIcon").click(function () {
                    setClipboard($(this).parent().text());
                });
        }, 1000);
    </script>
     * */
}
