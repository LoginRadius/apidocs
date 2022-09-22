<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}

if (!file_exists(API_APIS_DOC_DIR . $document . ".json")) {
    header("Location: /404");
    exit();
}
$arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );

$apiDoc = json_decode(file_get_contents(APIS_URL . "getdocument.php?document=" . API_DOCS.'/'.$document,false, stream_context_create($arrContextOptions)), true);
$apiDoc = isset($apiDoc['data'])?json_decode($apiDoc['data']):'';
$api['name'] = isset($apiDoc->name) ? $apiDoc->name : '';
$api['method'] = isset($apiDoc->method) ? $apiDoc->method : '';
$api['description'] = isset($apiDoc->description) ? $apiDoc->description : '';
$api['domain'] = isset($apiDoc->domain) ? $apiDoc->domain : '';
$api['path'] = isset($apiDoc->path) ? $apiDoc->path : '';
$api['getparams'] = isset($apiDoc->getparams) ? $apiDoc->getparams : '';
$api['postparams'] = isset($apiDoc->postparams) ? $apiDoc->postparams : '';
$api['headers'] = isset($apiDoc->headers) ? $apiDoc->headers : '';
$api['response'] = isset($apiDoc->response) ? $apiDoc->response : '';
?>

<div class="apiPageWrapper">
    <div class="apiHeaderWrapper">
        <div class="headerTitle"></div>
        <div class="headerEndpoint"></div>
        <div class="headerDescription"></div>

        <!-- Navigation Tabs -->
        <div class="api-tabs col-10" id="apiTabs">
            <ul class="api row nav-tabs">
                <li id="tabDefinitions" class="active">Definition</li>
                <li id="tabTry" class="">Try It Out</li>
                <li id="tabSDK" class="">SDK</li>
                <li id="tabCode" class="code_popup_view_button">Code</li>
            </ul>
        </div>
    </div>

    <!-- Content of the tabs -->
    <div class="row tab-content apiContentWrapper">
        <!-- Definitions -->
        <div id="apiDefinitions" class="api-definitions tab-pane fade in active ">
            <div class="wrapper">
                <div class="api-svg">
                    <div>
                        <svg width="38" height="152" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g class="layer">
                                <title>Layer 1</title>
                                <text fill="#000000" fill-opacity="0.2" font-family="Open Sans, Segoe UI, sans-serif"
                                    font-size="32" id="request-svg" class="request-svg" stroke="#000000" stroke-dasharray="null"
                                    stroke-linecap="null" stroke-linejoin="null" stroke-opacity="0.19" stroke-width="0"
                                    text-anchor="middle" transform="rotate(-90 18.9026 76.102) matrix(0.983945 0 0 1.02176 12.7788 0.823692)"
                                    x="6.23209" xml:space="preserve" y="85.18941">REQUEST</text>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="line-svg"></div>
                    </div>
                </div>

                <div class="docs-params"></div>

                <div></div>
                <div style="width: 100%; height: 25px;"></div>

                <div class="api-svg response-svg">
                    <div>
                        <svg width="38" height="152" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g class="layer">
                                <title>Layer 1</title>
                                <text fill="#000000" fill-opacity="0.2" font-family="Open Sans, Segoe UI, sans-serif"
                                    font-size="32" id="request-svg" class="request-svg" stroke="#000000" stroke-dasharray="null"
                                    stroke-linecap="null" stroke-linejoin="null" stroke-opacity="0.19" stroke-width="0"
                                    text-anchor="middle" transform="rotate(-90 18.9026 76.102) matrix(0.983945 0 0 1.02176 12.7788 0.823692)"
                                    x="6.23209" xml:space="preserve" y="85.18941">RESPONSE</text>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="line-svg"></div>
                    </div>
                </div>

                <!-- Ace editor -->
                <!-- <div>
                <div id="output-header" class="output-header">Output Format</div>
                <div id="ace-editor">
                </div>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js" charset="utf-8"></script>
                <script>var editor = ace.edit("ace-editor");</script>
                </div> -->
                <!-- <div class="apiresult outputformat" style="display:none;">
                    <div class="def head">Output Format
                        <div id="apioutputformatscreen" style="float: right;display: none;"></div>
                    </div>
                    <div id="apiOutputFormat" class="def-output body"></div>
                </div>
                <div></div> -->

                <div class="apiresult outputformat" style="display:none;">
                        <div class="">
                    <div class="def head col-10">Output Format
                        <div id="apioutputformatscreen" class="apioutputformatscreen" style="float: right;display: none;"></div>
                    </div>
                    <div id="apiOutputFormat" class="api-output-format def-output body"></div>
                    <div class = errorCodeLink></div>
                    </div>
                </div>

                <div></div>
                <div style="width: 100%; height: 50px;"></div>

                <!-- <div class="errorCodesContainer" style="display: none;">
                    <div id="apiErrorCodes" class="api-error-codes">
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Try It Out -->
        <div id="apiTry" class="api-try tab-pane fade">
            <div class="wrapper">
                <div class="api-svg">
                    <div>
                        <svg width="38" height="152" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g class="layer">
                                <title>Layer 1</title>
                                <text fill="#000000" fill-opacity="0.2" font-family="Open Sans, Segoe UI, sans-serif"
                                    font-size="32" id="request-svg" class="request-svg" stroke="#000000" stroke-dasharray="null"
                                    stroke-linecap="null" stroke-linejoin="null" stroke-opacity="0.19" stroke-width="0"
                                    text-anchor="middle" transform="rotate(-90 18.9026 76.102) matrix(0.983945 0 0 1.02176 12.7788 0.823692)"
                                    x="6.23209" xml:space="preserve" y="85.18941">REQUEST</text>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="line-svg"></div>
                    </div>
                </div>

                <div class="api-calls-section">
                    <!-- <h3>Query</h3> -->
                    <div id="apiquery" class="apiquery"></div>
                    <h3>Header</h3>
                    <div id="apiheaders" class="apiheaders"></div>
                    <div id="apitemplate" class="apitemplate"></div>
                    <!-- <div style="height: 2vh"></div> -->
                    <div id="apibody">
                        <div class="">

                            <select id="apibodytype" class="apibodytype">
                                <!-- <option value="normal">Normal</option> -->
                                <option value="json">JSON</option>
                            </select>
                        </div>
                        <h3>Body</h3>
                        <div id="apibodysection" class="apibodysection"></div>
                    </div>
                    <!-- <div style="height: 2vh"></div> -->
                    <h3 style="margin-bottom: 0px;margin-top: 30px;">Request URL</h3>
                    <div class="clear"></div>

                        <div class="request-url-wrapper">
                            <div class="col-1">
                                <label for="apimethod">
                                    <div id="apimethod" class="inputRow apimethod">POST</div>
                                </label>
                            </div>
                            <div class="col-8">
                                <label for="apiurl" style="display: inline;">
                                    <div id="apiurl" class="apiurl">
                                        <div id="apidomain" class="apidomain">
                                            <?php echo $api['domain']; ?>
                                        </div>
                                        <input type="text" readonly="" id="apipath" class="apipath" value="<?php echo $api['path']; ?>">
                                    </div>
                                    <input type="hidden" id="apioutputtype" value="<?php echo $api['response']; ?>">
                                </label>
                            </div>
                            <!-- Send Button -->
                            <div class="col-1">
                                <button id="apisend" type="button" class="apisend inputRow">SEND REQUEST</button>
                            </div>
                            <div class="recaptcha"></div>

                        </div>

                </div>

                <div></div>
                <div style="width: 100%; height: 60px;">
                <div id="loadingGif" hidden>
                        <img id="popout-icon" src="<?php echo THEME_URL; ?>/assets/images/ajax-loader.gif" alt="loader">
                    </div>
                </div>
                <div class="api-svg">
                    <div>
                        <svg width="38" height="152" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g class="layer">
                                <title>Layer 1</title>
                                <text fill="#000000" fill-opacity="0.2" font-family="Open Sans, Segoe UI, sans-serif"
                                    font-size="32" id="request-svg" class="request-svg" stroke="#000000" stroke-dasharray="null"
                                    stroke-linecap="null" stroke-linejoin="null" stroke-opacity="0.19" stroke-width="0"
                                    text-anchor="middle" transform="rotate(-90 18.9026 76.102) matrix(0.983945 0 0 1.02176 12.7788 0.823692)"
                                    x="6.23209" xml:space="preserve" y="85.18941">RESPONSE</text>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="line-svg"></div>
                    </div>
                </div>

                <div class="apiresult">
                    <div class="col-5">
                        <div class="head col-10"><b>Request</b>
                            <div id="apirequestscreen" class="apirequestscreen"></div>
                        </div>
                        <div id="apirequest" class="apirequest body col-10" placeholder="true" data-text="LoginRadius API headers"></div>
                    </div>
                    <div class="col-5">
                        <div class="head col-10"><b>Response</b>
                            <div id="status_code" class="status-code" style="float: right;"></div>
                            <div id="apiresponsescreen" class="apiresponsescreen"></div>
                        </div>
                        <div id="apiresponse" class="apiresponse body col-10" placeholder="true" data-text="LoginRadius API response in JSON format"></div>
                    </div>
                </div>

                <div></div>
                <div class="api-postman-btn">
                </div>

                <div></div>
                <div style="width: 100%; height: 40px;"></div>
            </div>
        </div>

        <!-- Code  -->
        <div id="apiCode" class="tab-pane fade">
            <?php $hooks->do_action('api_docs_tabs', $api);?>
            <div class="generateCodeArea"></div>
        </div>

        <!-- SDK -->
        <div id="apiSDK" class="api-SDK tab-pane fade">
        </div>
    </div>
    <script>
/**
 * Init recaptcha
 */
if (typeof grecaptcha !== 'undefined') {
var reCaptchaIDs = [];
var initRecaptcha = function () {
    jQuery('.recaptcha').each(function (index, el) {
        var container = jQuery(this).parents('form');
        var tempID = grecaptcha.render(el, {
            'sitekey': '<?php echo RECAPTCHA_SITE_KEY; ?>',
            'theme': 'light',
            'badge': 'bottomright',
            'size': 'invisible',
            'callback': function (token) { // We may need the token later, who knows!
                sendRequest(token);
            }
        });
        reCaptchaIDs.push(tempID);
    });
};
//Reset reCaptcha
var recaptchaReset = function () {
    if (typeof reCaptchaIDs != 'undefined') {
        var arrayLength = reCaptchaIDs.length;
        for (var i = 0; i < arrayLength; i++) {
            grecaptcha.reset(reCaptchaIDs[i]);
        }
    }
};
}
</script>