jQuery(document).ready(function () {
    loadSideMenu();
    $(".home").children().removeClass("selected");
    $(".toggle-content").click(function () {
        if ($(this).parent().next('ul').hasClass("hidden"))
        {
            $(".toggle-content").removeClass("selected");
            $(this).addClass("selected");
            $(".toggle-content").parent().next('ul').addClass("hidden");
            $(this).parent().next('ul').toggleClass("hidden", "");
        } else {
            $(this).removeClass("selected");
            $(this).parent().next('ul').addClass("hidden");
        }
    });

    $('#menucontainer ul a').each(function () {
        if ($(this).attr('href') == window.location.pathname) {
            $(this).parents('ul').removeClass("hidden");
        }
    });

    $(".mobileMenu, .mobileClose").click(function () {
        $('#sidebar').toggle();
    });
    $('#content-wrapper').scroll(function (event) {
        if ($('#content-wrapper').scrollTop() > 250) {
            if (!$(".scrollTop").length) {
                $('body').append('<div class="scrollTop"></div>');
            }
        } else {
            if ($('.scrollTop')) {
                $('.scrollTop').remove();
            }
        }
        $('.scrollTop').click(function () {
            $("#content-wrapper").animate({scrollTop: 0}, 250);
        });
    });
});

function increaseProcess() {
    var process = 1;
    var refreshIntervalId = setInterval(function () {
        $('#loading-bar').css("width", process + '%');
        process++;
        if (process > 100) {
            clearInterval(refreshIntervalId);
            resetProcess();
        }
    }, 10);
}

function resetProcess() {
    $('#loading-bar').css("width", '0%');
}

function loadSideMenu() {
    $('#menucontainer ul a').click(function (e) {
        pageLoad($(this).attr("href"));
        document.title = $(this).text() + ' | LoginRadius Docs';
        e.preventDefault();
    });
}
function parseURL(url) {
    var parser = document.createElement('a'),
        searchObject = {},
        queries, split, i;
    // Let the browser do the work
    parser.href = url;
    // Convert query string to object
    queries = parser.search.replace(/^\?/, '').split('&');
    for( i = 0; i < queries.length; i++ ) {
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
function pageLoad(mddocument) {
    increaseProcess();
    var mddocumentpath = parseURL(mddocument);
    $.ajax({url: apiURL + "getdocument.php", data: {"document": mddocumentpath.pathname}, dataType: "json", success: function (result) {
            if (result.status == 'success') {
                if (result.isAuth) {
                    var authLogin = '<div class="protactedOver"><div class="protactedText"><h2>This content is password protected.</h2><p>To view it please enter your password below:</p>';
                    authLogin += '<div id="protactedMessage"></div>';
                    authLogin += '<input class="protacted-password" id="protactedPassword" placeholder="Password..."/>';
                    authLogin += '<br><button id="protactedPasswordSubmit" class="protacted-password-submit">Submit</button></div></div>';
                    $('#content').html(authLogin);
                    $('#protactedPasswordSubmit').click(function () {
                        protactedDocsRequest();
                    });
                    setCookie('protactedDocument', '', 1);
                } else {
                    $('#content').html(replaceMarkDownContaint(marked(result.data)));
                }
                pagePush(mddocument);
                if(mddocument.indexOf('infrastructure-and-security/loginradius-data-regions')!==-1){
                    setTimeout(datamap_tooltip, 2000);
                }
                resetProcess();
            } else {
                window.location.href = mddocument;
            }
        }
    });
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
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
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


function pagePush(url) {
    var urlHashValue = '';
    if (window.location.hash.substr(1)) {
        setTimeout(function () {
            if(typeof ($('#' + window.location.hash.substr(1)).offset()) != "undefined"){
                $(window).scrollTop($('#' + window.location.hash.substr(1)).offset().top - 80);
            }
        }, 2000);
        urlHashValue = '#' + window.location.hash.substr(1);
    }
    window.history.pushState("object or string", "Title", url.replace(rootPath + docPath, rootPath) + urlHashValue);
    if ($("#sidebar").css('display') == 'block') {
        $("#sidebar").hide();
    }
    $("html, body").animate({scrollTop: 0}, 600);
    $('.nav-link-active').removeClass("nav-link-active");
    $('#menucontainer ul a').each(function () {        
        if ($(this).attr('href') == url) {
            $(this).parents('li').addClass("nav-link-active");
        }
    });
    setTimeout(function(){
        jQuery( 'table' ).wrap( "<div class='lr-docs-table'></div>" );
        if (typeof imageZoom != 'undefined') {
            imageZoom();
            jQuery('.pswp').addClass('pswp');
        }
    },1000);
}
function datamap_tooltip() {
    $description = $(".svg_description");
    $('.svg_enabled').hover(function () {
        $(this).attr("class", "svg_enabled svg_heyo");
        $description.addClass('active');
        $description.html($(this).attr('id'));
    }, function () {
        $description.removeClass('active');
    });
    $('#lr_svg_map').on('mousemove', function (e) {
        var rect = this.getBoundingClientRect();
        $description.css({
            //left: e.originalEvent.layerX,
            //top: e.originalEvent.layerY - 60
            left: e.clientX - rect.left - this.clientLeft + this.scrollLeft ,
            top: e.clientY - rect.top - this.clientTop + this.scrollTop - 60
        });
    });
}
jQuery(document).ready(function(){
    if (jQuery(window).width() <= 1024) {
    $(".custom-algolia-search").hide();
    $(".custom-api-menu").hide();
    $(".mobile_search").click(function(){       
        $(".custom-algolia-search").slideToggle();
        $(".custom-api-menu").hide();
        $('#material_sel-option').removeClass();
    });
    $(".mobile_menu").click(function(){
        $(".custom-api-menu").slideToggle();
        $(".custom-algolia-search").hide();
        $('#material_sel-option').removeClass();
    });
}



setTimeout(datamap_tooltip, 2000);
});