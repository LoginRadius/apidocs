/*API MAIN*/

//global variables
//var sdkMarkArray;

if (getCookie('requiredKeySkip') == '') {
    setCookie('requiredKeySkip', 'false');
}

function increaseProcess() {
    var process = 1;
    var refreshIntervalId = setInterval(function () {
        $('#LoadingGif').css("width", process + '%');
        process++;
        if (process > 100) {
            clearInterval(refreshIntervalId);
            resetProcess();
        }
    }, 10);
}

function resetProcess() {
    $('#LoadingGif').css("width", '0px');
}

/*
 Replace text in mobile-ios-library
 */

function detectChange(selector) {
    $('.objectiveC').toggle();
    $('.swift').toggle();
}

var postmanLinks_v2 = {
    "Authentication": "25783581-51d1c105-a913-4d09-b9f3-cf3277badded",
    // Account API to Account
    "Account": "25783581-74136b5f-8b69-4217-9761-44f75e785610",
    "Roles Management": "25783581-53224474-6e05-42b5-83f0-56e58bd2f018",
    //"Social Login": "b1bcce763fa199f7377d",
    "Phone Authentication": "25783581-e977628d-4c4a-45c8-abfe-15031706f191",
    "Two Factor Authentication [2FA]": "e24c1498e05b3e361a9b",
    "One-Click Authentication": "994be75a4c3a9a88ea82",
    "Email Prompt Auto Login": "da0e4c74b065e4716c19",
    "Simplified Registration": "980fdf827c6897ccd91a",
    "Custom Object Management": "25783581-a7d1aa74-a50b-4406-9977-bfabe3877ad2",
    "Custom Registration Data": "127ed73d8540edb05d84",
    "Infrastructure": "96c1844d0905e5a6688d",
    "Cloud Directory": "6e2e453fcaaf8481397f",
    //Web hooks to Webhooks
    "Webhooks": "25783581-d1bc6ead-5899-4be9-aa76-56901ee666f9",
    "Social Share and Access Permissions": "a7ecb5ca487fb08bdda5",
    // Adding new rules
    "Native Social Login API": "25783581-ea9f7f2e-82cf-4b0d-a4e0-34bcd0cde515",
    "Social Login": "25783581-ea9f7f2e-82cf-4b0d-a4e0-34bcd0cde515",
    //Below This Multifactor Tabs
    "Multi-Factor Authentication": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "Authenticator": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "SMS Authenticator": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "Email Authenticator": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "Security Question Authenticator": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "Backup Codes": "25783581-b9b6f5d9-3484-40ee-8d55-1762b6869456",
    "PIN Authentication": "25783581-e17e6f06-8537-4f24-98f2-ceb253472fd3",
    "Step-Up Authentication": "25783581-a66796ce-b741-4e3c-ba8d-d54e1c2c6b98",
    "MFA": "25783581-a66796ce-b741-4e3c-ba8d-d54e1c2c6b98",
    "PIN": "25783581-a66796ce-b741-4e3c-ba8d-d54e1c2c6b98",
    "Consent Management": "25783581-bcbca9fd-6fa2-43af-af92-e3df10ee07e5",
    "Passwordless Login": "25783581-33a6a022-e722-4577-88ce-91f7579b14d5",
    "Refresh Token": "25783581-cdd38f18-bf0d-425f-8268-b106df87e3ff",
    "Smart Login": "25783581-517df7f2-fb8a-45b3-b649-797f8c743048",
    "One Touch Login": "25783581-a8d8c881-e7d0-4eb7-96b9-d31c4bf6ef77",
    "Custom Object": "25783581-88009596-22a5-45bc-a57c-41580175656c",
    "Session": "25783581-c8b4bb70-6684-4e80-a53d-0bce2afd13cd",
    "Configuration": "25783581-44853f87-4875-4046-b3cd-91005769241c",
    "Identity": "25783581-ce3ca8c4-be59-4b74-a89a-e55238d217f7",
    "Custom Objects": "1af2a3e638f5ab415da2",
    "Insights": "25783581-c394556d-f0a1-4e2e-908b-7e57e8cdd94e",
    // Below This all Single Sign-on
    "OAuth 2.0": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "JWT Login": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "OpenID Connect": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "SAML": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "Machine To Machine": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "SSO Connector": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8",
    "Cross Device SSO": "25783581-434a1742-ec00-4126-8fd9-bade0b2212f8"
}
var postmanLinks_v1 = {
    "User API": "890d9b94fb5df827606d",
    "Account API": "df0e783d7a87501f8489",
    "Custom Object API": "dda9980e5a7c17e48cdd",
    "Social Login": "50bb45409d06d7104c86",
    "Cloud Directory": "8c68980b983cd35ee6d1",
    "Advanced Social Api": "48161f5c6f543496986d",
}


function changePostMan(theSideBar) {
    var theLink = "https://app.getpostman.com/run-collection/";
    if (window.location.href.indexOf("v2") >= 0) {
        theLink += postmanLinks_v2[theSideBar]
        if (postmanLinks_v2.hasOwnProperty(theSideBar)) {
            $('.postman-run-button').attr("href", theLink);
            $('.postman-run-button').show();
            $('#tabPostman').show();
        } else {
            $('.postman-run-button').hide();
            $('#tabPostman').hide();
        }
    } else {
        theLink += postmanLinks_v1[theSideBar];
        if (postmanLinks_v1.hasOwnProperty(theSideBar)) {
            $('.postman-run-button').attr("href", theLink);
            $('.postman-run-button').show();
        } else {
            $('.postman-run-button').hide();
        }
    }
}

function postManExport(link) {
    return ('<a class="postman-run-button" style="float:right" target="_blank" rel="noopener noreferrer"><img src="https://run.pstmn.io/button.svg" alt= "Run in Postman"</a>')
}

function downloadPostManTemplate() {
    var postman_template = {
        "id": "e8f826b9-a63b-709f-5563-39da32c87009",
        "name": "LoginRadius Environment",
        "values": [{
            "enabled": true,
            "key": "apikey",
            "value": "",
            "type": "text"
        },
        {
            "enabled": true,
            "key": "apisecret",
            "value": "",
            "type": "text"
        },
        {
            "enabled": true,
            "key": "access_token",
            "value": "",
            "type": "text"
        }
        ],
        "timestamp": 1501518569634,
        "_postman_variable_scope": "environment",
        "_postman_exported_at": "2017-07-31T16:29:31.717Z",
        "_postman_exported_using": "Postman/5.1.1"
    };

    var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(postman_template));

    var downloadAnchorElement = document.getElementById('downloadPostManTemplate');
    downloadAnchorElement.setAttribute("href", dataStr);
    downloadAnchorElement.setAttribute("download", "template.json");
}




function closeNavBar() {
    $('.md-sidebar.md-sidebar--primary').toggle();
    sideMenuPadding();
}

function hideNavBar() {
    var elements = document.getElementsByClassName("md-flex__cell md-flex__cell--shrink");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.display == 'none') {
            elements[i].style.display = 'inline-block';
            $(".md-flex-button").addClass('close');

        } else {
            elements[i].style.display = 'none';
            $(".md-flex-button").removeClass('close');
        }
    }
}

function tableOfContentsMobile() {
    var endResult;
    var tocElements = $('#tableofcontainer .md-nav__item a');

    if (tocElements !== null) {
        if ($('#menucontainer .md-nav__item label.md-nav__link')[0].innerHTML !== 'Table of Contents') {
            endResult = generateContainerSideBar(tocElements)
            $('#menucontainer').prepend(endResult)
            $("#menucontainer label.md-nav__link").first().click(function (e) {
                $(this).next('ul').slideToggle(100);
            });
        } else {
            $('#menucontainer .md-nav__item ul')[0].innerHTML = repopulateContainerSidebar(tocElements);
        }
    }
}

function generateContainerSideBar(tocElements) {

    var toc = "<li class= 'md-nav__item md-nav__item--nested md-tableofcontents'>" +
        "<input class= 'md-toggle md-nav__toggle' data-md-toggle = 'nav-toc' type = 'checkbox' id = 'nav-toc'>" +
        "<label class = 'md-nav__link' for = 'nav-toc'>" +
        "Table of Contents" +
        "</label>" +
        "<ul class = 'md-nav__list' data-md-scrollfix >"

    // MUCH CUSTOM VERY DYNAMIC

    $(tocElements).each(function () {
        var renderedElement = "<li class = 'md-nav__item'>"
        renderedElement += this.outerHTML;
        renderedElement += "</li>"
        toc += renderedElement;
    });

    toc += "</ul></li>"

    return toc;
}

function repopulateContainerSidebar(tocElements) {
    var toc = "";
    $(tocElements).each(function () {
        var renderedElement = "<li class = 'md-nav__item'>"
        renderedElement += this.outerHTML;
        renderedElement += "</li>"
        toc += renderedElement;
    });

    toc += "</ul></li>"

    return toc;
}


$(document).click(function () {
    var elements = document.getElementsByClassName("md-flex__cell md-flex__cell--shrink");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.display == 'inline-block' && !above700) {
            elements[i].style.display = 'none';
            $(".md-flex-button").removeClass('close');

        }
    }
});


$(".md-flex-button").click(function (e) {
    e.stopPropagation();
    return false;
});

$("#algoliasearch").click(function (e) {
    e.stopPropagation();
    return false;
});



$(document).ready(function () {

    updateContainer();
    $(window).resize(function () {
        updateContainer();
    });
});

// helper function to set up a postman query w/ arbitary number of queries
// parameter: query -> takes in a JSON obj.
// expected return value: an array with queries
function setupQuery(query) {
    finalQuery = [];
    for (var key in query) {
        if (query.hasOwnProperty(key)) {
            var element = {
                "key": key,
                "value": query[key],
                "equals": true,
                "description": ""
            }
            finalQuery.push(element);
        }
    }
    return finalQuery;
}

// helper function to extract name of the postman request
// expected return value: string
function nameOfCall() {
    var rawName = window.location.pathname;
    var n = rawName.lastIndexOf('/');
    return rawName.substring(n + 1);
}

// helper function when the json is ready to be exported
// params: finalReq -> the formatted JSON file that complies with postman
function downloadReady(finalReq) {
    var contentType = 'application/json';
    var textToSave = JSON.stringify(finalReq);
    var hiddenElement = document.createElement('a');

    hiddenElement.href = 'data:' + contentType + "," + encodeURI(textToSave);
    hiddenElement.target = '_blank';
    hiddenElement.download = 'export.json';
    hiddenElement.click();
}


// helper function to set up the keys and values of the postman json file
// params: url:string -> the api url (the url to be called)
//         finalQuery:string -> arbitary amount of queries complied to the postman format
//         body:JSON Object -> calls getOptionsParameters which gives us the 'body' portion of the postman call
//         resultName:string -> the name of the api call (ex: auth-login-by-email)
//         finalPath:string-array -> the path of the api call excluding the hostname (needed for the postman call in an array format)
function createPostManJson(url, finalQuery, body, resultName, finalPath) {
    var finalReq = {};
    finalReq['variables'] = [];
    finalReq['info'] = {
        'name': 'LoginRadius API Calls',
        'schema': "https://schema.getpostman.com/json/collection/v2.0.0/collection.json"
    }
    finalReq['item'] = [{
        'name': resultName, //parsed the name of the postman call to be the pathname
        'request': {
            'url': {
                'raw': url,
                'protocol': "https",
                'auth': {},
                'host': [
                    'api',
                    'loginradius',
                    'com'
                ],
                'path': finalPath, // an array
                'query': finalQuery, // an array
                "variable": []
            },
            "method": body.method,
            "header": [{
                "key": "Content-Type",
                "value": "application/json",
                "description": ""
            }],
            "body": {
                "mode": "raw",
                "raw": JSON.stringify(body.post_data)
            },
            "description": ""
        },
        "response": []
    }]

    return finalReq;
}


function postManRequest() {
    var url = "https://api.loginradius.com" + document.getElementById("apipath").value
    var rawQuery = JSON.parse(getparamsparamerter('apiquerieskey', 'apiqueriesvalue'));
    var finalQuery = setupQuery(rawQuery);
    var body = JSON.parse(getOptionsParameters());
    var resultName = nameOfCall();

    // setting up the path
    var finalPath = apipath.value.split("/");
    finalPath.shift();

    // finalreq is the full JSON exported to comply with postman
    var finalReq = createPostManJson(url, finalQuery, body, resultName, finalPath);

    // the postman req is now ready to be downloaded.
    downloadReady(finalReq);
}

function updateContainer() {
    var $containerWidth = $(window).width();
    if ($containerWidth >= 1220) {
        if ($('.md-sidebar--primary').css('display') === 'none')
            $('.md-sidebar--primary').toggle()
    }
}


function createSideBar(result, count) {
    var html = '';
    count++;
    for (var key in result) {
        if ((typeof result[key]['url'] != 'undefined') && (typeof result[key]['title'] != 'undefined')) {
            html += '<li class="md-nav__item">';
            html += '<a href="' + apiURL + result[key]['url'].replace('../', '') + '" class="md-nav__link">' + result[key]['title'] + '</a>';
            html += '</li>';
        } else if (typeof result[key] == "object") {
            html += '<li class="md-nav__item md-nav__item--nested">';
            html += '<input class="md-toggle md-nav__toggle" data-md-toggle="nav-' + count + '" type="checkbox" id="nav-' + count + '">';
            html += '<label class="md-nav__link" for="nav-' + count + '">' + key + '</label>';
            html += '<ul class="md-nav__list" data-md-scrollfix="">';
            html += createSideBar(result[key], count);
            html += '</ul></li>';
        } else {
            continue;
        }
    }
    return html;
}

function loadVersion(sdkMarkArray) {
    $('#menucontainer a,.md-footer-nav a').click(function (e) {
        pageLoad($(this).attr("href"), sdkMarkArray);
        $("html, #panel2").animate({
            scrollTop: 0
        }, 600);
        e.preventDefault();
    });
    $("#menucontainer label.md-nav__link").click(function (e) {
        $(this).next('ul').slideToggle(100);
    });
    resetProcess();
}

function pagePush(url) {
    var urlHashValue = '';
    if (window.location.hash.substr(1)) {
        setTimeout(function () {
            if (typeof ($('#' + window.location.hash.substr(1)).offset()) != "undefined") {
                $("#panel2").scrollTop($('#' + window.location.hash.substr(1)).offset().top - 80);
            }
        }, 2000);
        urlHashValue = '#' + window.location.hash.substr(1);
    }
    window.history.pushState("object or string", "Title", url.replace(rootURL + docPath, rootURL) + urlHashValue);

    var canonicalUrl = window.location.href
    $("#canonicalLink").attr("href", canonicalUrl)

    setTimeout(function () {
        jQuery('table').wrap("<div class='lr-docs-table'></div>");
        if (jQuery(window).width() < 865) {
            //            jQuery('.md-sidebar.md-sidebar--primary').hide();
            jQuery('.md-nav__link.md-nav__link--active').next('ul').show();
            $('.api.col-8.custom-container ').css('margin-left', '0');
        }
        if (typeof imageZoom != 'undefined') {
            imageZoom();
            jQuery('.pswp').addClass('pswp');
        }
    }, 1000);
    if (typeof (sh_quickMenuList) != 'undefined') {
        sh_quickMenuList(sh_support.Files.QuickLink);
    }
}


function protectedDocumentLoad(id, result, functionHandler) {
    if (result.isAuth) {
        var authLogin = '<div class="protactedOver"><div class="protactedText"><h2>This content is password protected.</h2><p>To view it please enter your password below:</p>';
        authLogin += '<div id="protactedMessage"></div>';
        authLogin += '<input id="protactedPassword" class="protacted-password" placeholder="Password..."/>';
        authLogin += '<br><button id="protactedPasswordSubmit" class="protacted-password-submit">Submit</button></div></div>';
        $('#' + id).html(authLogin);
        $('#protactedPasswordSubmit').click(function () {
            protactedDocsRequest();
        });
        setCookie('protactedDocument', '', 1);
    } else {
        $('#' + id).html(functionHandler(result.data));
    }
}

function protactedDocsRequest() {
    var password = $("#protactedPassword").val();
    $("#protactedMessage").html('').hide();
    if (password != '') {
        setCookie('protactedDocument', password, 1);
        window.location.href = window.location.href;
    } else {
        $("#protactedMessage").html('Password is required parametter').show();
    }
}

function pageLoad(mddocument, sdkMarkArray) {
    increaseProcess();
    var mddocumentpath = parseURL(mddocument);
    $.ajax({
        url: apiURL + "getdocument.php",
        data: {
            "document": mddocumentpath.pathname
        },
        dataType: "json",
        success: function (result) {
            if (result.status == 'success') {
                if (result.format == 'json') {
                    if (!$('#apiurl').length) {
                        window.location.href = mddocument;
                    } else {
                        protectedDocumentLoad('protactedContent', result, apimainpage); //123
                        if (JSON.parse(result.data).response == "") {
                            $('#apiresponse').attr('data-text', '');
                        } else {
                            $('#apiresponse').attr('data-text', 'LoginRadius API response in JSON format');
                        }
                    }
                } else {
                    if (!$('#mdcontainer').length) {
                        window.location.href = mddocument;
                    } else {
                        protectedDocumentLoad('mdcontainer', result, documentmainpage);
                    }
                }
                // Check if the link element with id 'canonicalLink' exists
                if (!document.getElementById('canonicalLink')) {
                    generateCanonicalLink()
                }
                pagePush(mddocument);
                if (result.status == 'success' && result.format == 'json')
                    computeSDKTable();
                tableOfContentsMobile();
                footerPagignation();
                resetProcess();
            } else {
                window.location.href = mddocument;
            }
        }
    });
    $('.feedback-form').css({ display: 'none' });
    $('.feedback-div-button').css({ display: 'block' });
    $('.feedback-message').css({ display: 'none' });
    $(".feedback-submit-button-skip").removeAttr("value");
    $(".feedback-submit-button-submit").removeAttr("value");
    $('#feedback-textarea').val('').css({ height: '100%' });
    $('.feedback-button').removeClass("active");


}

function generateCanonicalLink() {
    var linkElement = $('<link>', {
        rel: 'canonical',
        id: 'canonicalLink',
        href: ''
    });



    // Append the link element to the head

    $('head').append(linkElement);

}

function documentmainpage(data) {
    $('#mdcontainer').html(replaceMarkDownContaint(marked(data)));
    $("#tableofcontainer").html('');
    $("#tableofcontainer").parent().hide();
    $("#table_container").hide();
    var prevH2Item, prevH3Item, prevH4Item, prevH2List, prevH3List, prevH4List = null;
    $("#mdcontainer h2, #mdcontainer h3, #mdcontainer h4").each(function (i) {
        var current = $(this);
        var hrefLink = current.text().replace(/\s/g, '-').replace(/[^a-zA-Z ]/g, "").toLowerCase();
        current.attr("id", hrefLink + i);

        var li = "<li class=\"md-nav__item\"><a href='#" + hrefLink + i + "' title='" + current.text() + "' class=\"md-nav__link\">" + current.text() + "</a></li>"

        if (current.text() != '') {
            if (current.is("h2")) {
                prevH2Item = $(li);
                prevH2Item.append(prevH2List);
                prevH2Item.appendTo("#tableofcontainer");
                replaceTopContainer('table_container', i, current.text());
                $("#tableofcontainer").parent().show();
            } else if (current.is("h3")) {
                if (prevH2List && prevH2List.length >= 1) {
                    prevH3List = $("<ul class =\" md-nav__list_h3\"></ul>");
                    prevH3Item = $(li);
                    prevH3List.append(prevH3Item);
                    prevH3List.appendTo(".md-nav__list_h3");
                }
                else {
                    prevH3List = $("<ul class =\" md-nav__list_h3\"></ul>");
                    prevH3Item = $(li);
                    prevH3List.append(prevH3Item);
                    prevH3List.appendTo("#tableofcontainer");
                    replaceTopContainer('table_container', i, current.text());
                    $("#tableofcontainer").parent().show();
                }
            }
            else if (current.is("h4")) {
                if (prevH3List && prevH3List.length >= 1) {
                    prevH4List = $("<ul class =\" md-nav__list_h4\"></ul>");
                    prevH4Item = $(li);
                    prevH4List.append(prevH4Item);
                    prevH4List.appendTo(prevH3List);

                }
                else {
                    prevH4Item = $(li);
                    prevH4Item.append(prevH4List);
                    prevH4Item.appendTo("#tableofcontainer");
                    replaceTopContainer('table_container', i, current.text());
                    $("#tableofcontainer").parent().show();
                }
            }
        }

    });

    $('.md-nav__list_h4').each(function () {

        if ($(this).has('li').length) {

            let c = $(this).parent().children("li");
            c.css("font-weight", "500");
        }
    });


    setTimeout(function () {
        jQuery('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
            jQuery(this).parent().prepend('<a class="codeCopyIcon"></a>');
        });
        jQuery(".codeCopyIcon").click(function () {
            setClipboard($(this).parent().text());
        });
    }, 1000);

    $('.tabssections .tabs span').click(function () {
        var clickedTab = ($(this).text());
        $('.tabsarea').children().removeClass('active').addClass('deactive');
        $('.tabssections .tabs span').removeClass('active').addClass('deactive');
        $(this).removeClass('deactive').addClass('active');
        var tabarea = $('.tabssections .tabsarea').children();
        tabarea.each(function () {
            if ($(this).attr('tabarea') == clickedTab) {
                $(this).removeClass('deactive').addClass('active');
            }
        });
        var tabs = $('.tabssections .tabs').children();
        tabs.each(function () {
            if ($(this).text() == clickedTab) {
                $(this).removeClass('deactive').addClass('active');
            }
        });
    });

}

function replaceTopContainer(id, count, name) {
    $("#" + id + ' ul').append("<li><a href='#" + name.replace(/\s/g, '-').replace(/[^a-zA-Z ]/g, "").toLowerCase() + count + "' title='" + name + "'>" + name + "</a></li>");
    $("#" + id).show();
}

function replaceMarkDownContaint(data) {
    var replaceObj = {
        "{{IP_FORMAT}}": "/^((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2}).){3}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})$/i",
        "{{URL_FORMAT}}": "/^((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)|)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!-\/]))?$/",
        "{{table_container}}": "<div id=\"table_container\"><ul></ul></div>"
    };
    for (var key in replaceObj) {
        var regex = new RegExp(key);
        data = data.replace(regex, replaceObj[key]);
    }
    return data;
}

function loadSideMenu(sdkMarkArray) {
    $('#menucontainer a,.md-footer-nav a').click(function (e) {
        pageLoad($(this).attr("href"), sdkMarkArray);
        e.preventDefault();
    });
    $("#menucontainer label.md-nav__link").click(function (e) {
        $(this).next('ul').slideToggle(100);
    });
    resetProcess();
}

function parseURL(url) {
    var parser = document.createElement('a'),
        searchObject = {},
        queries, split, i;
    // Let the browser do the work
    parser.href = url;
    // Convert query string to object
    queries = parser.search.replace(/^\?/, '').split('&');
    for (i = 0; i < queries.length; i++) {
        split = queries[i].split('=');
        searchObject[split[0]] = split[1];
    }
    return {
        protocol: parser.protocol,
        host: parser.host,
        hostname: parser.hostname,
        port: parser.port,
        pathname: parser.pathname,
        search: parser.search,
        searchObject: searchObject,
        hash: parser.hash
    };
}

function activateParent(selectedDiv) {
    var parent = selectedDiv.parent().parent().prev('label');
    if (!selectedDiv.is(":visible")) {
        parent.click();
    }

    if (parent.length === 0) {
        return;
    }
    parent.addClass("md-nav__link--active");
    activateParent(parent);
}

function footerPagignation() {
    setTimeout(function () {
        var footerLink = [];
        var footerTitle = [];
        $("#menucontainer a").each(function () {
            footerLink.push($(this).attr('href'));
            footerTitle.push($(this).html());
            if ($(this).attr('href') == window.location.href.split('#')[0]) {
                var url = window.location.pathname
                var title = generateSeoTitle(url)
                document.title = title + ' |LoginRadius Docs';
                $("#menucontainer a").removeClass("md-nav__link--active");
                $(".md-nav__link--active").each(function () {
                    $(this).removeClass("md-nav__link--active")
                })
                $(this).addClass("md-nav__link--active");
                changePostMan($(this).parent().parent().prev('label')[0].innerHTML)
                activateParent($(this));
            }
        });

        var footerLinksCount = footerLink.length;
        var currentCount = footerLink.indexOf(window.location.href);
        var previousCount = currentCount - 1;
        var nextCount = currentCount + 1;
        if ((previousCount > -1) && (nextCount == footerLinksCount)) {
            $('.md-footer-nav .md-footer-nav__link--prev').attr('href', footerLink[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--prev').attr('title', footerTitle[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--prev .md-flex__ellipsis').html('<span class="md-footer-nav__direction">Previous</span>' + footerTitle[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--next').hide();
            $('.md-footer-nav .md-footer-nav__link--prev').show();
        } else if ((previousCount < 0) && (nextCount < footerLinksCount)) {
            $('.md-footer-nav .md-footer-nav__link--prev').hide();
            $('.md-footer-nav .md-footer-nav__link--next').show();
            $('.md-footer-nav .md-footer-nav__link--next').attr('title', footerTitle[nextCount]);
            $('.md-footer-nav .md-footer-nav__link--next').attr('href', footerLink[nextCount]);
            $('.md-footer-nav .md-footer-nav__link--next .md-flex__ellipsis').html('<span class="md-footer-nav__direction">Next</span>' + footerTitle[nextCount]);
        } else {
            $('.md-footer-nav .md-footer-nav__link--prev').attr('title', footerTitle[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--prev').attr('href', footerLink[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--prev .md-flex__ellipsis').html('<span class="md-footer-nav__direction">Previous</span>' + footerTitle[previousCount]);
            $('.md-footer-nav .md-footer-nav__link--next').attr('title', footerTitle[nextCount]);
            $('.md-footer-nav .md-footer-nav__link--next').attr('href', footerLink[nextCount]);
            $('.md-footer-nav .md-footer-nav__link--next .md-flex__ellipsis').html('<span class="md-footer-nav__direction">Next</span>' + footerTitle[nextCount]);
            $('.md-footer-nav .md-footer-nav__link--prev').show();
            $('.md-footer-nav .md-footer-nav__link--next').show();
        }
        $("html, #panel2").animate({
            scrollTop: 0
        }, 600);
        tocAutoActive("tableofcontainer");
    }, 500);
}

function tocAutoActive(id) {

    // Cache selectors
    var topMenu = $("#" + id),
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var item = $($(this).attr("href"));
            if (item.length) {
                return item;
            }
        });
}
/**
 * API SCRIPT
 * @param {*} file 
 * @param {*} callback 
 */
function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    };
    rawFile.send(null);
}

function generate_SOTT(query) {
    if (apikey == '' || secret == '') {
        $(".popup-model-overlay").show();
    } else {
        getSOTT(query);
    }
}

function getSOTT(query) {
    if (apikey == '' || secret == '') {
        setTimeout(function () {
            $('.api' + query + 'value').each(function () {
                if ($(this).val() == '@sott@') {
                    $(this).val('');
                }
            });
        }, 2000);
    } else {
        increaseProcess();
        $.ajax({
            url: apiURL + "sott.php?apikey=" + apikey + "&secret=" + secret,
            type: "POST",
            dataType: "json",
            success: function (data) {
                resetProcess();
                if (data.status == 'error') {
                    data.response = '';
                }
                $('.api' + query + 'value').each(function () {
                    if (($(this).val() == '@sott@') || ($(this).attr('placeholder') == '@sott@') || ($(this).attr('placeholder') == '"sott"') || ($(this).attr('placeholder') == '"X-LoginRadius-Sott"')) {
                        $(this).val(data.response);
                    }
                });
            }
        });
    }
}

function apiquery(params, sott_button, access_token_button, apikey_button) {
    var output = '';
    var token_val = getCookie('token');
    if (!jQuery.isEmptyObject(params)) {
        $('#apiquery').show();
        output += "<h3>Query</h3>";
    } else {
        $('#apiquery').hide();
    }

    if (params != '') {
        var lenofobject = Object.keys(params).length;
        var count = 0;
        var show_key = '';

        for (var key in params) {
            show_key = key;
            if (params[key] == '@sott@') {
                getSOTT('queries');
            }
            if (key.indexOf('*') !== -1) {

                show_key = key.replace('*', "<span class='required'>*</span>");

            }
            if (((key == 'token*') || (key == 'access_token*')) && token_val != '') {
                params[key] = token_val;
            }


            if ((key == 'token*') || (key == 'access_token*')) {
                output += '<div class="apiquerieshead"><div class="apiquerieskey">' + show_key + '</div>';
                output += '<div class="inputFieldButton"><input type="text" placeholder="&quot;' + key.replace('*', '') + '&quot;" class="apiqueriesvalue key_' + key.replace('*', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
                output += access_token_button + '</div></div>';
                count++;
            }
            else if ((key == 'apikey*') || (key == 'key*')) {
                output += '<div class="apiquerieshead"><div class="apiquerieskey">' + show_key + '</div>';
                output += '<div class="inputFieldButton"><input type="text" placeholder="&quot;' + key.replace('*', '') + '&quot;" class="apiqueriesvalue key_' + key.replace('*', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
                output += apikey_button + '</div></div>';
                count++;
            }
            else {
                output += '<div class="apiquerieshead"><div class="apiquerieskey">' + show_key + '</div>';
                output += '<input ';
                if (key.includes("apisecret") || key.includes("api_secret") || key.includes("secret*")) {
                    output += 'type="password"';
                } else {
                    output += 'type="text"';
                }
                output += 'placeholder="&quot;' + key.replace('*', '') + '&quot;" class="apiqueriesvalue key_' + key.replace('*', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
                output += '</div>';
                count++;
            }
        }
    } else {
        insertrow('apiquery', 'queries');
    }
    return output;
}

/**
 * 
 * @param {*} params 
 */
function apitemplate(params) {
    var output = '';
    var count = 0;
    output = '<div></div><h3>Template</h3><div></div>'
    for (var key in params) {
        output += '<div class="apitemplateskey">' + params[key].replace('{', '').replace('}', '').toLowerCase() + '<span class="required">*</span></div>';;
        output += '<input type="text" placeholder="' + params[key].replace('{', '&quot;').replace('}', '&quot;').replace('*', '').toLowerCase() + '" class="apitemplatevalue">';
        count++;
    }
    return output;
}

function apiheaders(params, sott_button, access_token_button) {
    var output = '';
    var token_val = getCookie('token');
    if (params != '') {
        var lenofobject = Object.keys(params).length;
        var count = 0;
        for (var key in params) {
            readonly = '';
            if (params[key] == '@sott@') {
                getSOTT('headers');
            } else if (((key == 'token*') || (key == 'access_token*') || (key == 'Authorization') || (key == 'Authorization*') || (key == 'Authorization@'))) {
                if (token_val) {
                    params[key] = 'Bearer ' + token_val;
                }

            } else {
                readonly = ' readonly';
            }

            //if SOTT required, insert get button
            output += '<div class="apiheadershead">';
            if ((key == 'X-LoginRadius-Sott') || (key == 'token*') || (key == 'access_token*') || (key == 'Authorization') || (key == 'Authorization*')) {
                output += '<div class="apiheaderskey">' + key + '<span class="required">*</span></div>';
                output += '<div class="inputFieldButton"><input type="text" placeholder="&quot;' + key.replace('*', '') + '&quot;"' + readonly + ' class="apiheadersvalue headerkey_' + key.replace('*', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
                if ((key == 'X-LoginRadius-Sott')) {
                    output += sott_button + '</div>';
                } else {
                    output += access_token_button + '</div>';
                }
            } 
            else if ( (key == 'token@') || (key == 'access_token@') || (key == 'Authorization@')) {
                output += '<div class="apiheaderskey">' + key.replace('@', '') + '</div>';
                output += '<div class="inputFieldButton"><input type="text" placeholder="&quot;' + key.replace('@', '') + '&quot;"' + readonly + ' class="apiheadersvalue headerkey_' + key.replace('@', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
                output += access_token_button + '</div>';      
            }
            else {
                output += '<div class="apiheaderskey">' + key + '</div>';
                output += '<input type="text" placeholder="&quot;' + key.replace('*', '') + '&quot;"' + readonly + ' class="apiheadersvalue headerkey_' + key.replace('*', '') + '" value="' + (params[key].replace('@apikey@', apikey).replace('@secret@', secret)) + '">';
            }
            output += '</div>';
            count++;
        }
        $("#tabheaders").show();
    } else {
        insertrow('apiheaders', 'headers');
    }
    return output;
}


function apipostbody(params) {
    $("#apibodytype").val('normal');
    var output = '';
    if (params != '') {
        var lenofobject = Object.keys(params).length;
        var count = 0;
        for (var key in params) {
            output += '<div><input type="text" class="apipostbodykey" value="' + key + '">';
            output += '<input  placeholder="&quot;' + key.replace('*', '') + '&quot;" type="text" class="apipostbodyvalue" value="' + params[key] + '">';
            output += '<img src="' + rootURL + 'theme/apidocs/assets/images/remove.png" style="width: 29px;" onclick="removerow(this,\'postbody\')"alt="remove_icon">';
            if (count == lenofobject - 1) {
                output += '<img class="insertpostbodyrow" src="' + rootURL + 'theme/apidocs/assets/images/add.png" style="width: 29px;" onclick="insertrow(\'apibodysection\', \'postbody\')"alt="add_icon">';
            }
            output += '</div>';
            count++;
        }
    } else {
        $('#apibodysection').html('');
        setTimeout(function () {
            insertrow('apibodysection', 'postbody');
        }, 200);
    }
    return output;
}

function apijsonbody(params) {
    $("#apibodytype").val('json');
    return '<pre><textarea class="col-10" id="apipostjsonbody" class="apipostjsonbody">' + JSON.stringify(params, undefined, 2) + '</textarea></pre>';
}

function setClipboard(value) {
    var tempInput = document.createElement("textarea");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    displaymessage('Copied! ');
}

/**
 * This is the main function for the API page 
 * 
 * @param {*} apiObject 
 */
function apimainpage(apiObject) {

    apikey = getCookie('apikey');
    secret = getCookie('secret');
    apiObject = JSON.parse(apiObject);
    $('.' + apiObject.name.toLowerCase().replace(/ /g, '_')).addClass('active');
    $("#apimethod").text(apiObject.method);
    $("#apiurl").html('<input type="text" readonly id="apipath" value="' +
        apiObject.domain.toLowerCase() + apiObject.path.toLowerCase() + '">');

    var a_button = '';
    var sott_button = '';
    var access_token_button = '';
    var rightClass = ' rightAlign';
    if (apikey != '' && secret != '') {
        rightClass = '';
        a_button += '<button onclick="logout()" class="LogoutButton"><i align="center" class="fa fa-2x fa-sign-out"></i>&nbsp;LOGOUT</button>';
    }
    if ('X-LoginRadius-Sott' in apiObject.headers) {
        sott_button += '<button onclick="generate_SOTT(\'headers\')" class="gettokenbutton' + rightClass + '">Get SOTT</button>';

    } else if ('sott*' in apiObject.getparams) {
        sott_button += '<button onclick="generate_SOTT(\'queries\')" class="gettokenbutton' + rightClass + '">Get SOTT</button>';
    }

    //access token required
    if (('Authorization*' in apiObject.headers) || ('Authorization@' in apiObject.headers) || ('Authorization' in apiObject.headers) || ('token*' in apiObject.getparams) || ('access_token*' in apiObject.getparams)) {
        access_token_button = '<button onclick="access_token_popup()" class="gettokenbutton' + rightClass + '">Get Access Token</button>';
    }
    if ((('apikey*' in apiObject.getparams) || ('apikey' in apiObject.getparams)) && (apikey == '' || secret == '')) {
        a_button += '<button onclick="api_access_token_popup()" class="gettokenbutton' + rightClass + '">ENTER</button>';
    }

    var params = apiquery(apiObject.getparams, sott_button, access_token_button, a_button);

    $("#apiquery").html(params);

    //API Page Header 
    $('.headerTitle').html('<div id="headerIcon" class="header-icon"><span class="apimethod' + apiObject.method.toUpperCase() + '">' + apiObject.method.toUpperCase() + '</span></div>' +
        '<h1 id="apiName" class="api-name">' + apiObject.name + '</h1><div></div><div id="headerBtns" class="header-btns"></div>');
    $('.headerEndpoint').html('<div id="end-point-label" class="end-point-label">End-Point</div><div><input type="text" readonly onclick="copyURLToClipboard(\'' + apiObject.domain + apiObject.path + '\')" class="apiurlbox" value="' + apiObject.domain + apiObject.path + '"><input type="hidden" id="apioutputtype" value="' + apiObject.response + '"></div>');
    $('.headerDescription').html('<div class="header apidescriptiondocs"><p>' + apiObject.description + '</p></div>');

    $('.api-postman-btn').html(postManExport());

    if (typeof apiObject.description == 'string') {
        $('.docs-description p.apidescriptiondocs').html(apiObject.description); //delete this redundant code?1000
    }
    var parametersHTML = '';
    if (typeof apiObject.parameters == 'object') {

        for (var pname in apiObject.parameters) {

            parametersHTML += '<h3>' + pname + '</h3>';
            if (typeof apiObject.parameters[pname] == 'object') {
                for (var key in apiObject.parameters[pname]) {
                    parametersHTML += '<div class="col-10">';
                    parametersHTML += '<div class="col-3">';
                    parametersHTML += '<b>' + apiObject.parameters[pname][key].name + ' : </b>';

                    parametersHTML += '</div>';
                    parametersHTML += '<div class="col-7">';
                    parametersHTML += apiObject.parameters[pname][key].description;
                    if (apiObject.parameters[pname][key].is_required) {
                        parametersHTML += ' <span class="required">[REQUIRED]</span>';
                    }
                    parametersHTML += '</div></div><div class="clear"></div>';
                }

            }
        }
    }
    $(".docs-params").html(parametersHTML);

    //for error code link
    var errorLinkHTML = '';
    errorLinkHTML += '<div class="docs-params"><br><h3>Error Codes</h3>';

    if (apiObject.errorcodes) {
        errorLinkHTML += '<div class="col-10"><div class="col-3"><b>Possible Error Codes : </b></div><div class="col-7">'
        for (var i = 0; i < apiObject.errorcodes.length; i++) {
            if (i == apiObject.errorcodes.length - 1) {
                //for the last error code
                errorLinkHTML += apiObject.errorcodes[i];
            } else {
                //for all non-last error codes
                errorLinkHTML += apiObject.errorcodes[i] + ", "
            }
        }
        errorLinkHTML += '</div>'
    }

    errorLinkHTML += '<div class="col-10"><div class="col-3"><b>More Details : </b></div><div class="col-7">';

    if (apiObject.domain == "https://api.loginradius.com") {
        errorLinkHTML += '<a href="' + rootURL + 'api/v2/getting-started/response-codes/customer-identity-api-codes/">Customer Identity API Error Codes</a>';
    }
    else {
        if (apiObject.path.substring(0, 4) == '/sso') {
            errorLinkHTML += '<a href="' + rootURL + 'api/v2/getting-started/response-codes/sso-api-codes/">SSO API Error Codes</a>';
        }
        else {
            errorLinkHTML += '<a href="' + rootURL + 'api/v2/getting-started/response-codes/cloud-directory-api-codes/">Cloud Directory API Error Codes</a>';
        }
    }
    errorLinkHTML += '</div></div>'
    $(".errorCodeLink").html(errorLinkHTML);

    var template = apiObject.path.match(/\{.*?\}/g); //this matches for a string that contains { }, likely JSON
    $('#tabtemplate').hide(); //hides element with this attribute 
    if (template != null) {
        $('#tabtemplate').show(); //show tab template
        $("#apitemplate").html(apitemplate(template)); //insert into element with attribute "apitemplate" 
        $(".apitemplatevalue").focusout(function () {
            var apitemplatevalue = apiObject.domain.toLowerCase() + apiObject.path.toLowerCase();
            $(".apitemplatevalue").each(function () {
                var userInput = $(this).val();
                var placeholder = $(this).attr('placeholder').replace(/\"/g, "");
                if (userInput != '') {
                    apitemplatevalue = apitemplatevalue.replace('{' + placeholder + '}', userInput);
                }
            });
            $('#apipath').val(apitemplatevalue);
        });
        $('#apitemplate').show();
    } else {
        $('#apitemplate').empty();
        $('#apitemplate').hide();
    }
    $("#apiheaders").html(apiheaders(apiObject.headers, sott_button, access_token_button));
    $('#apiresponsescreen').html('<i class="fa fa-expand"></i>').hide();
    $("#apioutputtype").val(apiObject.response.toLowerCase());


    if (apiObject.method.toLowerCase() != 'get') {
        if (JSON.stringify(apiObject.headers).indexOf('application/json')) {

            $("#apibodytype").val('json');

            // jsonDisplay.jsonstring = JSON.stringify(apiObject.postparams, undefined, 2);
            // jsonDisplay.outputDivID = "apibodysection";
            // jsonDisplay.typeOf = 'body';
            // jsonDisplay.outputPretty(JSON.stringify(apiObject.postparams, undefined, 2));
            // '<pre><textarea class="col-10" id="apipostjsonbody" class="apipostjsonbody">' + JSON.stringify(params, undefined, 2) + '</textarea></pre>';
            $("#apibodysection").html(apijsonbody(apiObject.postparams));
        } else {
            $("#apibodysection").html(apipostbody(apiObject.postparams));
        }

        $("#apibodytype").change(function () {
            if ($(this).val() == 'json') {
                $("#apibodysection").html(apijsonbody(apiObject.postparams));
            } else {
                $("#apibodysection").html(apipostbody(apiObject.postparams));
            }
        });
        $("#tabheader,#tabbody, #apibody").show();
        //if body does not exist, hide the body section
        if (apiObject.postparams == "") {
            $("#apibody").css("display", "none");
        }
    } else {
        $("#tabheader,#tabbody, #apibody").hide();
    }
    if (getCookie('requiredKeySkip') == 'false' && (apikey == '' || secret == '')) {
        setTimeout(function () {
            $(".popup-model-overlay").show();
        }, 3000);
    }
    $('#apirequest, #apiresponse, #status_code').html('');
    $('.apirequesturl').hide();

    if (apiObject.outputFormat) {
        if (apiObject.response == "xml") {
            jsonDisplay.responseType = "xml";
            jsonDisplay.jsonstring = apiObject.outputFormat;
            jsonDisplay.outputDivID = "apiOutputFormat";
            jsonDisplay.outputPretty(apiObject.outputFormat);
        }
        //TODO: ace editor 
        else {
            jsonDisplay.jsonstring = JSON.stringify(apiObject.outputFormat, null, 2);
            jsonDisplay.outputDivID = "apiOutputFormat";
            jsonDisplay.outputPretty(JSON.stringify(apiObject.outputFormat, null, 2));
        }
        apioutputformatscreen();
    } else {
        $('.outputformat').hide();
        // $('.api-svg.response-svg').hide();
    }

    $(window).on('resize', function () {
        var sidebar = $('.md-sidebar--primary');
        var sideMenuDisplay = $('.md-sidebar.md-sidebar--primary.md-sidebar-width').css('display');
        if (sideMenuDisplay == "none") {
            $('.api.col-8.custom-container ').css('margin-left', '0');
        } else {
            $('.api.col-8.custom-container ').css('margin-left', sidebar.css('width'));
        }
    });

    $('.md-nav__link.md-nav__link_custom.method-POST').click(function () {
        sideMenuPadding();
    });

    setTimeout(function () {
        if ($("#apiquery").html() == "") {
            $("#tabquery").hide();
        }
        if ($("#apitemplate").html() == "") {
            $("#tabtemplate").hide();
        }
        if ($("#apiheaders").html() == "") {
            $("#tabheaders").hide();
        }
        if ($("#apibody").html() == "") {
            $("#tabbody").hide();
        }
        if ($("#apiDefinitions").html() == "") {
            $("#tabDefinitions").hide();
        }
        if ($("#apiTry").html() == "") {
            $("#tabTry").hide();
        }
        if ($("#apiCode").html() == "") {
            $("#tabCode").hide();
        }
        if ($("#apiSDK").html() == "") {
            $("#tabSDK").hide();
        }
        if ($("#apiPostman").html() == "") {
            $("#tabPostman").hide();
        } else if ($("#apiDefinitions").html() != '') {
            $("#tabDefinitions").click();
        } else if ($("#apiTry").html() != '') {
            $("#tabTry").click();
        } else if ($("#apiCode").html() != '') {
            $("#tabCode").click();
        } else if ($("#apiSDK").html() != '') {
            $("#tabSDK").click();
        } else if ($("#apiPostman").html() != '') {
            $("#tabPostman").click();
        }
    }, 1000);
}

/**
 * 
 * @param {*} key 
 * @param {*} value 
 */
function getparamsparamerter(key, value) {
    var querykey = [];
    $('.' + key).each(function () {
        if ((key == 'apiquerieskey') || (key == 'apiheaderskey')) {
            querykey.push($(this).text().replace('*', ''));
        } else {
            if ($(this).val().includes('*')) {
                querykey.push($(this).val().replace('*', ''));
            } else {
                querykey.push($(this).val());
            }
        }
    });

    var queryval = [];
    $('.' + value).each(function () {
        queryval.push($(this).val());
    });
    var query = '{';
    for (var i = 0; i < querykey.length; i++) {
        query += '"' + querykey[i] + '":"' + queryval[i] + '",';
    }
    var outquery = '';
    if (i > 0) {
        outquery = query.substring(0, query.length - 1);
    }
    if (outquery.length) {
        outquery += '}';
    }
    return outquery;
}

function getOptionsParameters() {

    var output = '{';
    output += '"headers":' + getparamsparamerter('apiheaderskey', 'apiheadersvalue') + ',';
    var method = $('#apimethod').text();
    output += '"method":"' + method + '",';
    output += '"output_format":"' + $('#apioutputtype').val() + '",';
    if (method != 'GET') {
        if ($('#apibodytype').val() == 'json') {
            output += '"post_data":' + $('#apipostjsonbody').val() + ',';
        } else {
            output += '"post_data":' + getparamsparamerter('apipostbodykey', 'apipostbodyvalue') + ',';
        }
        output += '"body_type":"' + $('#apibodytype').val() + '",';
    }
    var outquery = output.substring(0, output.length - 1);
    outquery += '}';
    return outquery;
}

/**
 * 
 * @param {*} url 
 * @param {*} action 
 */
function get_hostname(url, action) {
    if (url.indexOf('https:') == 0) {
        var m = url.match(/^https:\/\/[^/]+/);
    } else {
        var m = url.match(/^http:\/\/[^/]+/);
    }
    var domain = m ? m[0] : false;
    if (domain) {
        if (action == 'query') {
            return url.replace(domain, "");
        } else if (action == 'host') {
            return domain.split('//')[1];
        } else if (action == 'domain') {
            return domain;
        }
    }
    return;
}

/**
 * 
 */
function sendRequest(token) {
    increaseProcess();
    $.ajax({
        url: apiURL + "apirequest.php",
        type: "POST",
        data: {
            url: $('#apipath').val(),
            params: getparamsparamerter('apiquerieskey', 'apiqueriesvalue'),
            options: getOptionsParameters(),
            recaptcha: token
        },
        dataType: "json",
        beforeSend: function () {
            $('#loadingGif').show();
        },
        success: function (data) {
            $('#loadingGif').hide();
            resetProcess();
            if (data.response) {
                if (typeof data.response == 'string') {
                    displaymessage(data.response);
                } else if (data.response.hasOwnProperty('success')) {
                    if (!data.response.success) {
                        if (typeof grecaptcha !== 'undefined') {
                            recaptchaReset();
                        }
                        displaymessage("Please Fill The Captcha Again!");
                    }
                }
                else {
                    if (typeof grecaptcha !== 'undefined') {
                        recaptchaReset();
                    }
                    var http_code = data.response.response_status_code.toString();
                    var http_code_class = 'undefined';
                    if (http_code.indexOf('1') == 0) {
                        http_code_class = 'continue'
                    } else if (http_code.indexOf('2') == 0) {
                        http_code_class = 'success'
                    } else if (http_code.indexOf('3') == 0) {
                        http_code_class = 'info'
                    } else if (http_code.indexOf('4') == 0) {
                        http_code_class = 'warning'
                    } else if (http_code.indexOf('5') == 0) {
                        http_code_class = 'important'
                    }
                    /* start create final request url */
                    var generateAPIURL = $('#apipath').val();
                    generateAPIURL = generateAPIURL.split('?')[0];
                    var params = getparamsparamerter('apiquerieskey', 'apiqueriesvalue')
                    if (params != "") {
                        var jsonParams = JSON.parse(params)
                        generateAPIURL += '?' + $.param(jsonParams);
                    }
                    $('#apipath').val(generateAPIURL);
                    /* end create final request url */
                    $('#apirequest').html('<pre>' + data.response.request_header + '</pre>');

                    $('#status_code').html('<div class="status-' + http_code_class + '">' + data.response.response_status_code + '</div>');

                    $('#status_code').css("display", "inline");

                    var xmlResponse = data.response.response_content;
                    var res = xmlResponse.substr(0, 1);
                    if (res == "<" || res != "{") {
                        var respcontent = data.response.response_content;
                        jsonDisplay.jsonstring = respcontent;
                        jsonDisplay.outputDivID = "apiresponse";
                        jsonDisplay.responseType = "xml";
                        jsonDisplay.outputPretty(respcontent);
                    }
                    else {
                        var respcontent = JSON.stringify(JSON.parse(data.response.response_content), null, 2);

                        var find = '<';
                        var re = new RegExp(find, 'g');

                        str = respcontent.replace(re, '&lt');
                        jsonDisplay.jsonstring = str;
                        jsonDisplay.outputDivID = "apiresponse";
                        jsonDisplay.outputPretty(str);
                        jsonDisplay.responseType = " ";


                    }

                    apiresponsescreen();
                }
            }
        }
    });
}

function apiresponsescreen() {
    $('#apiresponsescreen').html('<i class="fa fa-expand"></i>').show();
    $('#apiresponsescreen').unbind("click")
    $('#apiresponsescreen').click(function () {
        if ($(this).html() == '<i class="fa fa-expand"></i>') {
            $('.apiresult .col-5:nth-child(2)').addClass('fullscreen');
            $('.apiresult #apiresponse').addClass('fullscreen');
            $(this).html('<i class="fa fa-compress"></i>');
        } else {
            $('.fullscreen').removeClass('fullscreen');
            $(this).html('<i class="fa fa-expand"></i>');
        }
    });
}
/**
 * API Output Format 
 */
function apioutputformatscreen() {
    $('.outputformat').show();
    // $('.api-svg.response-svg').show();
    $('#apioutputformatscreen').html('<i class="fa fa-expand"></i>').show();

    $('#apioutputformatscreen').unbind("click")
    $('#apioutputformatscreen').click(function () {
        if ($(this).html() == '<i class="fa fa-expand"></i>') {
            $('.outputformat .head.col-10').addClass('fullscreen');
            $('.outputformat #apiOutputFormat').addClass('fullscreen');
            $(this).html('<i class="fa fa-compress"></i>');
        } else {
            $('.fullscreen').removeClass('fullscreen');
            $(this).html('<i class="fa fa-expand"></i>');
        }
    });
}

function removerow(element, name) {
    $(element).parent().remove();
    if ($('.insert' + name + 'row').length <= 0) {
        var query = name;
        if (query == 'queries') {
            query = 'query';
        } else if (name == 'postbody') {
            query = 'bodysection';
        }
        insertrow('api' + query, name);
    }
}

function insertrow(id, name) {
    var insertrow = $(".insert" + name + "row");
    var addRowHtml = insertrow.prop('outerHTML');
    insertrow.remove();
    if (typeof addRowHtml == "undefined") {
        addRowHtml = '<img class="insert' + name + 'row" src="' + rootURL + 'theme/apidocs/assets/images/add.png" style="width: 29px;" onclick="insertrow(\'' + id + '\', \'' + name + '\')"alt="add_icon">';
    }
    var output = '';
    output += '<div><input type="text" class="api' + name + 'key">';
    output += '<input type="text" class="api' + name + 'value">';
    output += '<img src="' + rootURL + 'theme/apidocs/assets/images/remove.png" style="width: 29px;" onclick="removerow(this, \'' + name + '\')"alt="remove icon">';
    output += addRowHtml + '</div>';
    $('#' + id).append(output);
}

function displaymessage(message) {
    if (message && message !== '') {
        if ($(".topmainslid").length == 0) {
            $('body').append('<div class="topmainslid">' + message + '<span class="top-mans-close"></span></div>');
        } else {
            $('.topmainslid').html(message + '<span class="top-mans-close"></span>');
            $('.topmainslid').show();
        }
        $(".top-mans-close").click(function () {
            $(".topmainslid").animate({
                'top': '-100%'
            });
        });
        $(".topmainslid").animate({
            'top': 70
        });
        setTimeout(function () {
            $(".topmainslid").fadeOut("slow");
        }, 5000);
        setTimeout(function () {
            $(".wrapper").animate({
                'top': 0
            });
        }, 10000);
    }
    return false;
}

function closePopup() {
    $('.popup-overlay').hide();
}

function addPopup(id) {
    $('#' + id).show();
}

function api_access_token_popup() {
    if (apikey == '' || secret == '') {
        $(".popup-model-overlay").show();
    }
}

function access_token_popup() {
    if (apikey == '' || secret == '') {
        $(".popup-model-overlay").show();
    } else {
        var popup = '<div id="popupoverlay" class="container popup-overlay" ng-show="showProfilePopup">';
        popup += '<script type="text/javascript"> $LRIC.util.ready(function() {var options = {};options.apikey = "' + getCookie('apikey') + '";options.templatename = "loginradiuscustom_tmpl";$LRIC.renderInterface("interface_container", options);}); </script>';
        popup += '<script type="text/html" id="loginradiuscustom_tmpl">   <a href="javascript:void()" onclick="return $LRIC.util.openWindow(\'<%=Endpoint%>&is_access_token=true&callback=' + window.location + '\')"><img src="' + rootURL + 'theme/apidocs/assets/images/socialicon/<%=Name%>-slider.png" alt="<%=Name%>"/></a> </script>';
        popup += ' <div class="row">';
        popup += ' <div class="centered-popup">';
        popup += ' <div class="panel panel-default popup-profile">';
        popup += '<span class="close-overlay-token-popup" onclick="closePopup();">x</span><h2>LoginRadius Interface</h2><div class="interface_container"> </div> </div>';
        popup += ' </div>';
        popup += ' </div>';
        popup += ' </div>';
        $('body').append(popup);
    }
}

function setCookie(cname, cvalue, exdays) {

    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/" + ";secure" + ";samesite=strict";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/**
 * Makes sure API Key and Secret are valid
 */
function authantication() {

    if (($("#apikey").val() == '') || ($("#secret").val() == '')) {
        $("#logininterfacemessage").html('<div class="popup_error"><i class="fa fa-times-circle"></i>APIKey and Secert is required fields.</div>');
    } else if ($("#apikey").val() == $("#secret").val()) {
        $("#logininterfacemessage").html('<div class="popup_error"><i class="fa fa-times-circle"></i>APIKey and Secert should not be same.</div>');
    } else if (($("#apikey").val() != '') && ($("#secret").val() != '')) {

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://config.lrcontent.com/ciam/appinfo?apikey=" + $("#apikey").val(),
            "method": "GET",
            "headers": {
                "content-Type": "application/x-www-form-urlencoded",
            },
        }

        $.ajax(settings)
            .done(function (response) {
                setCookie('apikey', $("#apikey").val());
                setCookie('secret', $("#secret").val());
                $("#logininterfacemessage").html('<div class="popup_success"><i class="fa fa-check"></i>Success Authentication...</div>');
                window.location.href = window.location.href;
            })
            .fail(function (response) {
                $("#logininterfacemessage").html('<div class="popup_error"><i class="fa fa-times-circle"></i>' + response.responseJSON.description + '</div>');
            });
    }
}

function logout() {
    setCookie('apikey', '');
    setCookie('secret', '');
    setCookie('token', '');
    window.location.href = window.location.href;
}

/*Changelog*/
function loadChangelog() {
    $('#changelogcontainer a').click(function (e) {
        changelogPageLoad($(this).attr("href"));
        e.preventDefault();
    });
    resetProcess();
}

function authersection(data) {
    var html = '';
    if (data.auther) {
        html += '<div class="text-overflow">';
        html += '<i class="fa fa-user fa-mono fa-right"></i>  ';
        html += data.auther;
        html += '</div>';
    }
    if (data.created_date) {
        html += '<div class="text-overflow">';
        html += '<i class="fa fa-clock-o fa-mono fa-right"></i>  ';
        html += data.created_date;
        html += '</div>';
    }
    return html;
}

function changelogsection(data) {
    var html = '';
    if (data.changelog) {
        html += '<h3>Change Log</h3>';
        html += '<table class="changelog">';
        for (var key in data.changelog) {
            for (var i in data.changelog[key]) {
                html += '<tr>';
                html += '<th class="changelog-tag">';
                html += '<div class="' + key.toLowerCase() + '">';
                html += key;
                html += '</div>';
                html += '</th><td>';
                html += data.changelog[key][i].text;
                html += '</td></tr>';
            }
        }
        html += '</table>';
    }
    return html;
}

function changelogPageLoad(mddocument) {
    increaseProcess();
    var mddocumentpath = parseURL(mddocument);
    $.ajax({
        url: apiURL + "getchangelog.php",
        data: {
            "document": mddocumentpath.pathname,
            "format": 'json'
        },
        dataType: "json",
        success: function (result) {
            var changelogUrl = mddocument.split('/api/')[1]
            generateSeoDescription(changelogUrl)

            if (result.status == 'success') {
                $('.single-changelog-post .post-title h1').html(result.data.name);
                $('.single-changelog-post .magic-block-textarea p').html(result.data.description);
                $('.single-changelog-post .changelogsection').html(changelogsection(result.data));
                $('.single-changelog-post .authersection').html(authersection(result.data));
                document.title = result.data.name
                if (!document.getElementById('canonicalLink')) {
                    generateCanonicalLink()
                }
                pagePush(mddocument);
                resetProcess();
            } else {
                window.location.href = mddocument;
            }
        }
    });
}

function getNumberFromPixel(value) {
    return parseInt(value.split("px")[0]);
}


function resizeSidebar(content) {
    var sidebar = $('.md-sidebar--primary');
    var sidebarHandle = $('.md-sidebar-handle');
    if (!sidebarHandle.length || sidebarHandle.css('display') == 'none') return;

    var isResizing = false;
    var isMaxOrMinResize = false;
    var contentMarginLeft = getNumberFromPixel(content.css('margin-left'));
    var maxResize = getNumberFromPixel(sidebar.css('width')) * 2;
    var minResize = getNumberFromPixel(sidebar.css('width'));

    // init sidebarHandle
    sidebarHandle.css('margin-left', sidebar.css('width'));
    sidebarHandle.css('height', sidebar.css('height'));



    sidebarHandle.on('mousedown', function () {
        $('body').css('cursor', 'col-resize');
        isResizing = true;
        isMaxOrMinResize = false;
        content.disableSelection();
        sidebar.disableSelection();
    });




    $(window).on('mousemove', function (e) {
        if (!isResizing) return;

        sidebarHandle.css('margin-left', e.clientX + 'px');

        // handle max and min resizing limits
        var sidebarHandlePosition = getNumberFromPixel(sidebarHandle.css('margin-left'));

        if (sidebarHandlePosition > maxResize) {
            sidebar.css('width', maxResize + 'px');
            isMaxOrMinResize = true;
            return;
        } else if (sidebarHandlePosition < minResize) {
            sidebar.css('width', minResize + 'px');
            isMaxOrMinResize = true;
            return;
        } else if (e.clientX < maxResize && e.clientX > minResize) {
            isMaxOrMinResize = false;
        }



        if (!isMaxOrMinResize) {
            sidebar.css('width', e.clientX + 'px');
            // for responsive content resizing
            if (e.clientX >= contentMarginLeft) {
                // drag sidebar right (left -> right)
                content.css('margin-left', e.clientX + 'px');
            } else {
                // drag sidebar left (right -> left)
                content.css('margin-left', contentMarginLeft + 'px');
            }
        }
    }).on('mouseup', function (e) {
        $('body').css('cursor', 'auto');
        isResizing = false;
        content.enableSelection();
        sidebar.enableSelection();
        sidebarHandle.css('margin-left', sidebar.css('width'));
    });
}

$.fn.disableSelection = function () {
    return this.attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);
};

$.fn.enableSelection = function () {
    return this.removeAttr('unselectable').css('user-select', 'auto').unbind('selectstart');
};

jQuery(document).ready(function ($) {


    $('.feedback-button').click(function () {

        $('.feedback-form').css({ display: 'block' });

        $(this).addClass("active");
        var thumbsValue = $(this).attr("value");
        if (thumbsValue == "Yes") {
            $('.fd_no').removeClass("active");
        } else {
            $('.fd_yes').removeClass("active");

        }
        // disable feedback button
        $('.feedback-submit-button-submit').attr("disabled", true).css({ "background-color": "rgba(0, 0, 0, 0.12" });


        $(".feedback-submit-button-skip").attr("value", thumbsValue);
        $(".feedback-submit-button-submit").attr("value", thumbsValue);
        $("body").css({ overflow: 'hidden' });

    });

    $('.feedback-submit-button-skip').click(function () {

        let feedbackValue = $(this).attr("value");

        $('.feedback-div-button').css({ display: 'none' });
        $('.feedback-message').css({ display: 'block' });

        let feedbackamp = window.location.pathname + '|' + feedbackValue;


        if (typeof (amplitude_email_address) !== 'undefined' && amplitude_email_address) {
            feedbackamp = feedbackamp + '|' + amplitude_email_address;
        }
        if (typeof (feedbackValue) === 'undefined') {
            console.log("undefined value");
        } else if (feedbackValue == "Yes" || feedbackValue == "No") {

            amplitude.getInstance().logEvent(feedbackamp);
        }

        $("body").css({ overflow: '' });

    });

    $('#feedback-textarea').keyup(function () {
        let button_value = $('.feedback-submit-button-submit').prop("disabled", (this.value === "") ? true : false);
        // add css property to disable and enable the button design
        let disableButton = $('.feedback-submit-button-submit').attr('disabled');

        if (disableButton) {
            $(".feedback-submit-button-submit").css({ "background-color": "rgba(0, 0, 0, 0.12)" });
        } else {
            $(".feedback-submit-button-submit").css({ "background-color": "#008ecf" });
        }

    });



    $('.feedback-submit-button-submit').click(function () {

        let feedbacktext = $('#feedback-textarea').val();

        if (feedbacktext) {

            let feedbackValue = $(this).attr("value");
            $('.feedback-div-button').css({ display: 'none' });
            $('.feedback-message').css({ display: 'block' });
            let feedbackamp = window.location.pathname + '|' + feedbackValue + '|' + feedbacktext;
            if (typeof (amplitude_email_address) !== 'undefined' && amplitude_email_address) {
                feedbackamp = feedbackamp + '|' + amplitude_email_address;
            }
            if (typeof (feedbackValue) === 'undefined') {
                console.log("undefined value");
            } else if ((feedbackValue == "Yes" || feedbackValue == "No")) {
                amplitude.getInstance().logEvent(feedbackamp);
            }
            $("body").css({ overflow: '' });
        }
    });


    if (window.LoginRadiusSDK) {
        LoginRadiusSDK.setLoginCallback(function () {
            var token = LoginRadiusSDK.getToken();
            setCookie('token', token);
            LoginRadiusSDK.getUserprofile(function () {
                $('.key_access_token, .key_token').val(token);
                $('.headerkey_Authorization').val('Bearer ' + token);


                closePopup();
                displaymessage('Latest Access Token Added.');
            });
        });
    }
    $("#loginsubmit").click(function () {
        authantication();
    });
    $("#logoutsubmit").click(function () {
        logout();
    });
    setTimeout(function () {
        $('.headerkey_Authorization').click(function () {
            $(this).removeAttr('readonly');
        });
    }, 1000);
    $(".logininterface .close").click(function () {
        setCookie('requiredKeySkip', 'true');
        $(".popup-model-overlay").hide();
    });
    $("#apisend").click(function (e) {
        e.preventDefault(); //prevent page reload
        if (grecaptcha.getResponse() !== 0) {
            grecaptcha.execute(); // Start the Google recaptcha
        }
        //$(window).trigger('resize'); 
    });

    /**
     * Function called when user selects a navigations tab
     * It removes the class active from all the other tabs that are not selected 
     */
    $('.nav-tabs li').click(function () { //on click
        $('.nav-tabs li').removeClass('active'); //remove active class 
        $(this).addClass('active'); //tab clicked on
        $(".tab-pane").removeClass('active'); //remove active class from class tabs-pane
        $("#" + ($(this).attr('id')).replace('tab', 'api')).addClass('active'); //make content of this tab active
    });

    increaseProcess();
    //    $('#material_select').click(function () {
    //        $('#material_sel-option').toggleClass('dd_active');
    //    });
    $(".md-icon--search").click(function () {
        $('.gsc-control-cse').toggleClass('mobileSearch');
    });
    $("#changelogcontainer label.md-nav__link").click(function (e) {
        $(this).next('ul').slideToggle(100);
    });



    $('#panel2').scroll(function (event) {
        if ($('#panel2').scrollTop() > 250) {

            if (!$(".scrollTop").length) {
                $('body').append('<div class="scrollTop"></div>');

                if (!$('#jssearchintercominterface').length) {

                    $(".scrollTop").css('right', '3rem');

                }
                $('.scrollTop').click(function () {
                    $("html, #panel2").animate({
                        scrollTop: 0
                    }, 600);
                });
            }
        } else {
            if ($('.scrollTop')) {
                $('.scrollTop').remove();
            }
        }
    });

});


/**
 * Hat tip to PumBaa80 http://stackoverflow.com/questions/4810841/json-pretty-print-using-javascript 
 * for the syntax highlighting function.
 **/
jsonDisplay = {

    jsonstring: '',
    outputDivID: 'shpretty',
    typeOf: '',
    responseType: '',

    outputPretty: function (jsonstring) {

        jsonstring = jsonstring == '' ? jsonDisplay.jsonstring : jsonstring;
        shpretty = jsonstring;

        if (jsonDisplay.responseType == "xml") {
            // prettify spacing
            var pretty = jsonstring;
            shpretty = jsonDisplay.pretifyXML(pretty);

        }
        else {

            shpretty = jsonDisplay.syntaxHighlight(shpretty);

        }
        if (jsonDisplay.typeOf == 'body') {
            $('#' + jsonDisplay.outputDivID).html('<pre>' + shpretty + '</pre>');
        } else {
            $('#' + jsonDisplay.outputDivID).html('<pre>' + shpretty + '</pre>');
        }
    },
    syntaxHighlight: function (json) {

        if (typeof json != 'string') {
            json = JSON.stringify(json, undefined, 2);
        }

        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
            var cls = 'number';
            if (/^"/.test(match)) {
                if (/:$/.test(match)) {
                    cls = 'key';
                } else {
                    cls = 'string';
                }
            } else if (/true|false/.test(match)) {
                cls = 'boolean';
            } else if (/null/.test(match)) {
                cls = 'null';
            }
            return '<span class="' + cls + '">' + match + '</span>';
        });
    },
    pretifyXML: function (xml) {
        var formatted = '';
        var cls = 'string';
        var reg = /(>)(<)(\/*)/g;
        xml = xml.replace(reg, '$1\r\n$2$3');
        var pad = 0;
        jQuery.each(xml.split('\r\n'), function (index, node) {
            var indent = 0;
            if (node.match(/.+<\/\w[^>]*>$/)) {
                indent = 0;
            } else if (node.match(/^<\/\w/)) {
                if (pad != 0) {
                    pad -= 1;
                }
            } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                indent = 1;
            } else {
                indent = 0;
            }

            var padding = '';
            for (var i = 0; i < pad; i++) {
                padding += '  ';
            }

            formatted += padding + node + '\r\n';
            pad += indent;
        });

        formatted = formatted.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/ /g, '&nbsp;').replace(/\n/g, '<br />');

        return '<span class="' + cls + '">' + formatted + '</span>';




        // var xmlDoc = new DOMParser().parseFromString(sourceXml, 'application/xml');
        // var xsltDoc = new DOMParser().parseFromString([
        //     // describes how we want to modify the XML - indent everything
        //     '<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform">',
        //     '  <xsl:strip-space elements="*"/>',
        //     '  <xsl:template match="para[content-style][not(text())]">', // change to just text() to strip space in text nodes
        //     '    <xsl:value-of select="normalize-space(.)"/>',
        //     '  </xsl:template>',
        //     '  <xsl:template match="node()|@*">',
        //     '    <xsl:copy><xsl:apply-templates select="node()|@*"/></xsl:copy>',
        //     '  </xsl:template>',
        //     '  <xsl:output indent="yes"/>',
        //     '</xsl:stylesheet>',
        // ].join('\n'), 'application/xml');

        // var xsltProcessor = new XSLTProcessor();    
        // xsltProcessor.importStylesheet(xsltDoc);
        // var resultDoc = xsltProcessor.transformToDocument(xmlDoc);
        // var resultXml = new XMLSerializer().serializeToString(resultDoc);
        // // return resultXml;
        // var cls = 'string';
        // return '<span class="' + cls + '">' + resultXml + '</span>';



    }
}

/**
 * Copies text to clipboard
 * @param {*} text 
 */
function copyURLToClipboard(text) {
    var dummy = document.createElement("input");
    document.body.appendChild(dummy);
    dummy.setAttribute('value', text);
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    displaymessage('Copied! ');
}

function sideMenuPadding() {
    var sidebar = $('.md-sidebar--primary');
    var sideMenuDisplay = $('.md-sidebar.md-sidebar--primary.md-sidebar-width').css('display');
    if (sideMenuDisplay == "none") {

        $('.api.col-8.custom-container ').css('margin-left', '0');

    } else {
        $('.api.col-8.custom-container ').css('margin-left', sidebar.css('width'));

    }
}

function checkTopMenuDisplay() {
    var topMenuDisplay = $('.md-flex__cell.md-flex__cell--shrink.custom-api-menu').css('display');
    if (topMenuDisplay == "none") {
        $('.api.col-8.custom-container').css('margin-top', '0');
    } else {
        $('.api.col-8.custom-container ').css('margin-top', '197px');
    }
}

function computeSDKTable() {

    //checking for V1 
    if (window.location.href.includes("/api/v1/")) {
        $('#apiSDK').html("<p>Switch to V2.0 to use this functionality</p>");
        return;
    }
    jQuery(document).ready(function ($) {
        $('#tabSDK').hide();
        var url = window.location.pathname;
        var hash = url.substring(0, url.length - 1);
        hash = '#' + hash.substring(hash.lastIndexOf("/") + 1, hash.length);
        var sdkExists = false;
        $('#apiSDK').html('<table></table>');
        $('.md-sidebar .method-SDK').each(function () {
            var sdk = {};
            sdk.title = $(this).attr('title');
            sdk.href = $(this).attr('href');
            if (sdk.href.search("mobile") == -1) {
                getSDKsss(sdk.href, function (result) {
                    if (result.status == 'success') {
                        if (result.format == 'md') {
                            parseSDKMDfilee(result.data, function (hash) {
                                if (hash != "") {
                                    $('#tabSDK').show();
                                    var html = '<tr><th>';
                                    var newHref = sdk.href.slice(0, sdk.href.length - 1);
                                    html += sdk.title;
                                    html += '</th><th>';
                                    html += '<a href="' + newHref + hash + '" title="' + sdk.title + '">Link</a>'
                                    html += '</th></tr>';
                                    $('#apiSDK table:first-of-type').append(html);
                                }
                            });
                        }
                    }
                });
            }
        });


        //for mobile sdks
        if ($('.docs-params div').find(":contains('apikey')").length > 0 && $('.docs-params div').find(":contains('apisecret')").length == 0) {
            $('#apiSDK').append('<h3>Mobile SDKs</h3>');
            $('#apiSDK').append('<table></table>');
            $('.md-sidebar .method-SDK').each(function () {
                var sdk = {};
                sdk.title = $(this).attr('title');
                sdk.href = $(this).attr('href');
                if (sdk.href.search("mobile") != -1) {
                    getSDKsss(sdk.href, function (result) {
                        if (result.status == 'success') {
                            if (result.format == 'md') {
                                var html = '<tr><th>';
                                var newHref = sdk.href.slice(0, sdk.href.length - 1);
                                html += sdk.title;
                                html += '</th><th>';
                                html += '<a href="' + newHref + '" title="' + sdk.title + '">Link</a>'
                                html += '</th></tr>';
                                $('#apiSDK table:last-of-type').append(html);
                            }
                        }
                    });
                }
            });
        }

        function getSDKsss(href, callback) {
            var mddocumentpath = parseURL(href);
            $.ajax({
                url: apiURL + "getdocument.php",
                data: {
                    "document": mddocumentpath.pathname
                },
                dataType: "json",
                success: function (result) {
                    callback(result);
                }
            });
        }
        function parseSDKMDfilee(data, callback) {
            var finalHash = '';
            if (data.search(hash) != -1) {
                finalHash = hash;
            }
            callback(finalHash);
        }
    });
}

/**
 * Tests that SDK redirection from API pages works by going through the sdk doc markdown files and looking for the correct hashes
 * @param {*} sdk_arr 
 */
function testSDKDocs(sdk_arr, sdkMarkArray) {

    //a textfile that contains all the api names (json file names)
    $.ajax({
        url: "/docs/theme/apidocs/assets/javascripts/allApiNames.txt",
        success: function (data) {

            var hashArr = data.split("\n");

            var j;
            for (j = 0; j < sdk_arr.length; j++) {
                var $table = $("<table></table>");

                var title = sdk_arr[j].toUpperCase();
                var $line = $("<tr></tr>");
                $line.append($("<td></td>").html(sdk_arr[j]));
                $table.append($line);
                var i;
                for (i = 0; i < hashArr.length; i++) {
                    $line = $("<tr></tr>");
                    $line.append($("<td></td>").html(hashArr[i]));

                    //if (sdkMarkArray[sdk_arr[j]].includes('(#' + hashArr[i] + ')')) {
                    if ((sdkMarkArray[sdk_arr[j]]['(#' + hashArr[i] + ')']) && sdkMarkArray[sdk_arr[j]]['(#' + hashArr[i] + ')'] == true) {
                        $line.append($("<td></td>").html("Correct"));
                    } else {
                        $line.append($("<td></td>").html("Error"));
                    }
                    $table.append($line);
                }
                //print table to a specified dom area 
                $table.appendTo('#runSDKTests');
            }
        }
    });
}


function generateSeoDescription(url) {
    var seoDescription = ' '
    var seoUrlArray = url.split('/');
    if (seoUrlArray[seoUrlArray.length - 1] == "") {
        seoUrlArray.pop()
    }
    seoUrlArray.forEach((element, i) => {
        if (i == seoUrlArray.length - 1) {
            seoDescription += capitalize(element.replace(/-/g, ' '))
        } else {
            seoDescription += capitalize(element.replace(/-/g, ' ')) + ' - '
        }
    })
    $('meta[name=description]').attr("content", "For immediate assistance, LoginRadius provides developer-friendly support docs | " + seoDescription);
}
function generateSeoTitle(url) {
    var seoDescription = ' '
    var seoUrlArray = url.split('/');
    if (seoUrlArray[seoUrlArray.length - 1] == "") {
        seoUrlArray.pop()
    }


    seoUrlArray.forEach((element, i) => {
        if (element != "api") {
            if (element != "v2" || element == "v1") {
                if (i == seoUrlArray.length - 1 || i == seoUrlArray.length - 2 || i == seoUrlArray.length - 3)
                    if (i == seoUrlArray.length - 1) {
                        seoDescription += capitalize(element.replace(/-/g, ' '))
                    } else {
                        seoDescription += capitalize(element.replace(/-/g, ' ')) + ' - '
                    }
            }

        }
    })

    return seoDescription;
}

function capitalize(str) {
    let urlElements = str.toLowerCase().replace(/^\w|\s\w/g, function (letter) {
        return letter.toUpperCase();
    });

    const mapObj = {
        Sso: "SSO",
        Jwt: "JWT",
        Api: "API",
        Url: "URL",
        Otp: "OTP",
        Pin: "PIN",
        Uid: "UID",
        Id: "ID",
        Oidc: "OIDC",
        Saml: "SAML",
        Idp: "IDP",
        Mfa: "MFA",
        Sp: "SP",
        Pkce: "PKCE",
        Qr: "QR",
        Adfs: "ADFS",
        Sdk: "SDK",
        Cms: "CMS",
        Cdn: "CDN",
        Ui: "UI",
        Ux: "UX",
        Idx: "IDX",
        Sms: "SMS",
        Ad: "AD",
        Sott: "SOTT",
        Faq: "FAQ",
        Lr: "LR",
        Smtp: "SMTP",
        Tls: "TLS",
        Uri: "URI",
        Js: "JS",
        Html: "HTML",
        Asp: "ASP",
        Php: "PHP",
        Ip: "IP",
        Aem: "AEM",
        Amp: "AMP",
        Css: "CSS",
        Etl: "ETL",
        DFP: "DFP",
        Ssl: "SSL",
        Https: "HTTPS"

    };

    let wordsTobeCaps = urlElements.replace(/\b(?:Sso|Jwt|Url|Api|Otp|Pin|Uid|id|Oidc|Saml|Idp|Mfa|Sp|Pkce|Qr|Adfs|Sdk|Cms|Cdn|Ui|Ux|Idx|Sms|Ad|Sott|Faq|Lr|Smtp|Tls|Uri|Js|Html|Asp|Php|Ip|Aem|Amp|Css|Etl|Dfp|Ssl|Https)\b/gi, (matched) => mapObj[matched]);

    return wordsTobeCaps;
}


        function toggleNightMode() {
            var nightModeBtn = document.getElementById('night-mode-btn');
            var body = document.getElementsByTagName('body')[0];
            
            nightModeBtn.addEventListener('click', function () {
                body.classList.toggle('night-mode');
            });
        }

        // Call the function to initialize the night mode toggle toggleNightMode();
