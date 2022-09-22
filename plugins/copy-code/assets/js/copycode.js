jQuery(document).ready(function ($) {
    $('.code_popup_view_button').click(function () {
        var popupHTML = '<div class="code_popup_view_overlay"><div class="code_popup_view_box">';
        //popupHTML += '<div class="code_popup_view_box_header"><div class="code_popup_view_box_header_logo">Generate Code Snippets</div><a href="#" class="code_popup_view_box_header_close"></a></div>';
        popupHTML += '<div class="code_popup_view_box_body">';

        popupHTML += '<div class="code_popup_view_header"><div class="code_popup_view_box_body_language_option_menu_wrapper">';
        popupHTML += '<div class="code_popup_view_box_body_language_option_menu"><div class="code_popup_view_box_body_language_option_menu_text">HTTP</div><div class="code_popup_view_box_body_language_option_menu_arrow"></div></div>';

        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-menu">';
	
        popupHTML += '<li class="menu-child"><a onload="generatedLanguage(\'http\', this)" onclick="generatedLanguage(\'http\', this)">HTTP</a></li>';
        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'c_LibCurl\', this)">C (LibCurl)</a></li>';
        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'curl\', this)">cURL</a></li>';
        //popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'c_RestSharp\', this)">C# (RestSharp)</a></li>';
        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'c_Sharp\', this)">C#</a></li>';
        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'go\', this)">GO</a></li>';

        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">Java</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        popupHTML += '<li><a onclick="generatedLanguage(\'java_OkHttp\', this)">OK HTTP</a></li>';
        //popupHTML += '<li><a onclick="generatedLanguage(\'java_Unirest\', this)">Unirest</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'java_HttpURLConnection\', this)">HttpURLConnection</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">JavaScript</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        popupHTML += '<li><a onclick="generatedLanguage(\'js_Ajax\', this)">Jquery Ajax</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'js_XHR\', this)">XHR</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">NodeJS</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        popupHTML += '<li><a onclick="generatedLanguage(\'nodejs_Native\', this)">Native</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'nodejs_Request\', this)">Request</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'nodejs_Unirest\', this)">Unirest</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'objective_C\', this)">Objective-C (NSURL)</a></li>';
        //popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'co_Http\', this)">OCaml (Cohttp)</a></li>';
        
        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">PHP</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        //popupHTML += '<li><a onclick="generatedLanguage(\'php_HttpRequest\', this)">HttpRequest</a></li>';
        //popupHTML += '<li><a onclick="generatedLanguage(\'php_PeclHttp\', this)">Pecl_http</a></li>';
        //popupHTML += '<li><a onclick="generatedLanguage(\'php_Fsockopen\', this)">fsockopen</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'php_Curl\', this)">cURL</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">Python</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        popupHTML += '<li><a onclick="generatedLanguage(\'python_HttpClient\', this)">http.client (Python 3)</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'python_Requests\', this)">Requests</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'ruby\', this)">Ruby (NET::Http)</a></li>';
        
        popupHTML += '<li class="code_popup_view_box_body_language_option_menu-child">';
        popupHTML += '<a class="code_popup_view_box_body_language_option_menu-child_anchor">Shell</a>';
        popupHTML += '<ul class="code_popup_view_box_body_language_option_open-child-menu">';
        popupHTML += '<li><a onclick="generatedLanguage(\'shell_Wget\', this)">wget</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'shell_Httpie\', this)">Httpie</a></li>';
        popupHTML += '<li><a onclick="generatedLanguage(\'shell_Curl\', this)">cURL</a></li>';
        popupHTML += '</ul>';
        popupHTML += '</li>';

        popupHTML += '<li class="menu-child"><a onclick="generatedLanguage(\'swift\', this)">Swift (NSURL)</a></li>';

        popupHTML += '</ul>';
        popupHTML += '</div>';
        popupHTML += '<div class="code_popup_view_box_body_code_copy_option"> <!--?xml version="1.0" encoding="utf-8"?--><!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --><svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="22px" viewBox="0 0 95 98" enable-background="new 0 0 95 98" xml:space="preserve"><polygon fill="none" stroke="#02060c" stroke-width="7" stroke-miterlimit="10" points="91.5,36.641 91.5,94.5 30.5,94.5 30.5,18.5 73.012,18.5 "></polygon><polygon fill="none" stroke="#02060c" stroke-width="7" stroke-miterlimit="10" points="64.5,16.641 64.5,18.5 30.5,18.5 30.5,79.5 3.5,79.5 3.5,3.5 51.012,3.5 "></polygon><polygon fill="none" stroke="#02060c" stroke-width="5" stroke-miterlimit="10" points="91.5,36.641 91.5,40.5 69.5,40.5 69.5,18.5 73.012,18.5 "></polygon></svg>Copy To Clipboard</div></div>';
        popupHTML += '<pre><code class="code_popup_view_box_body_code_area"></code></pre>';
        popupHTML += '</div></div></div>';
        if (typeof $('.code_popup_view') != 'undefined') {
            //$('body').append('<div class="code_popup_view">' + popupHTML + '</div>');
            $('.generateCodeArea').html('<div class="code_popup_view">' + popupHTML + '</div>');
        } else {
            $('.code_popup_view').html(popupHTML);
        }

        generatedLanguage('http', null);
        $('.code_popup_view_box_body_code_copy_option').click(function () {
            setClipboard($('.code_popup_view_box_body_code_area').text());
        });
        $('.code_popup_view_box_header_close').click(function () {
            $('.code_popup_view').html('');
        });
        $(".code_popup_view_box_body_language_option_open-menu,.code_popup_view_box_body_language_option_open-child-menu").hide();
        $(".code_popup_view_box_body_language_option_menu").click(function () {
            $(".code_popup_view_box_body_language_option_open-menu").slideToggle("fast");
        });
        $(".code_popup_view_box_body_language_option_menu-child").click(function () {
            $('.code_popup_view_box_body_language_option_open-child-menu').hide();
            $(this).children(".code_popup_view_box_body_language_option_open-child-menu").slideToggle("fast");
        });
    });
});

//$(document).on('click', function (e) {
//    if ($(e.target).closest(".code_popup_view_box_body_language_option_menu").length === 0) {
//        $(".code_popup_view_box_body_language_option_open-menu").hide();
//    }
//});

function generatedLanguage(lang, selected) {
    if (lang != '') {
        var languageFunction = 'generated' + capitalizeFirstLetter(lang) + 'Language';
        if (typeof window[languageFunction] != 'undefined') {
            var options = {};
            options.method = $('#apimethod').html();
            options.url = $('#apipath').val();
            var tempURL = (options.url).split('?');
            options.url = tempURL[0];
            options.getParams = {};
            $('.apiquerieshead').each(function () {
                var key = $(this).children('.apiquerieskey').text().replace(/\*/g, "");
                if((key == 'apikey') || (key == 'key')) {
                    options.getParams[key] = $(this).children('.inputFieldButton').children('.apiqueriesvalue').val();
                } else {
                    options.getParams[key] = $(this).children('.apiqueriesvalue').val();
                }

            });
            options.getHeaders = {};
            $('.apiheadershead').each(function () {
                var key = $(this).children('.apiheaderskey').text().replace(/\*/g, "");
                if((key == 'X-LoginRadius-Sott') || (key == 'token') || (key == 'access_token') || (key == 'Authorization') || (key == 'Authorization')) {
                    options.getHeaders[key] = $(this).children('.inputFieldButton').children('.apiheadersvalue').val();
                }else {
                options.getHeaders[key] = $(this).children('.apiheadersvalue').val();
                }
            });
            if (options.method != 'GET') {
                options.bodyType = $('#apibodytype').val();
                options.body = {};
                if (options.bodyType == 'json') {
                    options.body = $('#apipostjsonbody').val();
                } else {
                    $('#apibodysection').find('div').each(function () {
                        options.body[$(this).children('.apipostbodykey').val().replace(/\*/g, "")] = $(this).children('.apipostbodyvalue').val()
                    });
                }
                if((options.body == '""') || (options.body == '')){
                    delete options.body;
                }
            }
            $('.code_popup_view_box_body_language_option_open-menu, .code_popup_view_box_body_language_option_open-child-menu').hide();
            var parentText = '';
            if($(selected).parents('.code_popup_view_box_body_language_option_menu-child').find('a.code_popup_view_box_body_language_option_menu-child_anchor').text() != ''){
                parentText = $(selected).parents('.code_popup_view_box_body_language_option_menu-child').find('a.code_popup_view_box_body_language_option_menu-child_anchor').text()+'<div class="code_popup_view_box_body_language_option_menu_parent_arrow"></div>';
            }
            if (selected){
                $('.code_popup_view_box_body_language_option_menu_text').html(parentText+$(selected).text());
            }            
            $('.code_popup_view_box_body_code_area').each(function (i, block) {
                $(this).removeAttr('class');
                $(this).text(eval(languageFunction)(options));
                $(this).addClass('code_popup_view_box_body_code_area');
                hljs.highlightBlock(block);
            });
        } else {
            $('.code_popup_view_box_body_code_area').html(lang);
        }
    }
}
function parseURLLocation(href) {
    var l = document.createElement("a");
    l.href = href;
    return l;
};
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
/* language generated code */
function generatedHttpLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = options.method + ' ' + location.pathname + '?' + $.param(options.getParams) + ' HTTP/1.1' + "\r\n";
    requestCode += 'Host: ' + location.hostname + "\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += key + ': ' + options.getHeaders[key] + "\r\n";
        }
    }
    requestCode += 'Cache-Control: no-cache' + "\r\n\r\n";
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += options.body;
            } else {
                requestCode += $.param(options.body);
            }
        }
    }
    return requestCode;
}
function generatedCurlLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'curl -X ' + options.method + ' \\' + "\r\n";

    requestCode += " '" + options.url + '?' + $.param(options.getParams) + "'" + ' \\' + "\r\n";
    requestCode += " -H 'Cache-Control: no-cache'" + " \\" + "\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += " -H '" + key + ": " + options.getHeaders[key] + "'" + " \\" + "\r\n";
        }
    }
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += " -d "+ JSON.stringify(options.body) + "\r\n";
            } else {
                requestCode += " -d '"+ $.param(options.body) +"'" + "\r\n";
            }
        }
    }
    return requestCode;
}
function generatedPhp_HttpRequestLanguage(options) {
    var requestCode = '<?php '+"\r\n\r\n";
    requestCode += "$request = new HttpRequest();"+"\r\n";
    requestCode += "$request->setUrl('"+options.url+"');"+"\r\n";
    requestCode += "$request->setMethod('"+options.method+"');"+"\r\n";

    if (options.getParams) {
        requestCode += "$request->setQueryData(array(" + "\r\n";          
        for (var key in options.getParams) {
            requestCode += "'" + key + "' => '" + options.getParams[key] + "'," + "\r\n";
        }
        requestCode += "));"+"\r\n";
    }

    if (options.getHeaders) {
        requestCode += "$request->setHeaders(array(" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += "'" + key + "' => '" + options.getHeaders[key] + "'," + "\r\n";
        }
        requestCode += "));"+"\r\n";
    }
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "$request->setBody("+ JSON.stringify(options.body) +");" + "\r\n";
            } else {
                requestCode += '$request->setBody('+ $.param(options.body) +"');" + "\r\n";
            }
        }
    }
    requestCode += "try {"+"\r\n";
    requestCode += "    $response = $request->send();"+"\r\n";
    requestCode += "    echo $response->getBody();"+"\r\n";
    requestCode += "} catch (HttpException $ex) {"+"\r\n";
    requestCode += "    echo $ex;"+"\r\n";
    requestCode += "}"+"\r\n";
    return requestCode;
}
function generatedPhp_PeclHttpLanguage(options) {
    var requestCode = '<?php '+"\r\n\r\n";
    requestCode += "$client = new http\\Client;"+"\r\n";
    requestCode += "$request = new http\\Client\\Request;"+"\r\n";
    
    if (options.bodyType) {
        if (options.body && options.body!="") {
            requestCode += "$body = new http\\Message\\Body;"+"\r\n";
            if (options.bodyType == 'json') {
                requestCode += "$body->append("+ JSON.stringify(options.body)+");" + "\r\n";
            } else {
                requestCode += '$body->append('+ $.param(options.body) +"');" + "\r\n";
            }
            requestCode += "$request->setBody($body);"+"\r\n";
        }
    }
    requestCode += "$request->setRequestUrl('"+options.url+"');"+"\r\n";
    requestCode += "$request->setRequestMethod('"+options.method+"');"+"\r\n";
    
    if (options.getParams) {
        requestCode += "$request->setQuery(new http\QueryString(array(" + "\r\n";          
        for (var key in options.getParams) {
            requestCode += "'" + key + "' => '" + options.getParams[key] + "'," + "\r\n";
        }
        requestCode += ")));"+"\r\n";
    }

    if (options.getHeaders) {
        requestCode += "$request->setHeaders(array(" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += "'" + key + "' => '" + options.getHeaders[key] + "'," + "\r\n";
        }
        requestCode += "));"+"\r\n";
    }
    requestCode += "$client->enqueue($request)->send();"+"\r\n";
    requestCode += "$response = $client->getResponse();"+"\r\n";
    requestCode += "echo $response->getBody();"+"\r\n";
    return requestCode;
}
function generatedPhp_CurlLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = '<?php '+"\r\n\r\n";
    requestCode += "$curl = curl_init();"+"\r\n";
    requestCode += "curl_setopt_array($curl, array("+"\r\n";
    requestCode += "CURLOPT_URL => '"+options.url+'?'+$.param(options.getParams)+"',"+"\r\n";
    requestCode += "CURLOPT_RETURNTRANSFER => true,"+"\r\n";
    requestCode += "CURLOPT_ENCODING => '',"+"\r\n";
    requestCode += "CURLOPT_MAXREDIRS => 10,"+"\r\n";
    requestCode += "CURLOPT_TIMEOUT => 30,"+"\r\n";
    requestCode += "CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,"+"\r\n";
    requestCode += "CURLOPT_CUSTOMREQUEST => '"+options.method+"',"+"\r\n";

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "CURLOPT_POSTFIELDS => '"+ options.body +"',"+"\r\n";
            } else {
                requestCode += "CURLOPT_POSTFIELDS => '"+ $.param(options.body) +"',"+"\r\n";
            }
        }
    }

    if (options.getHeaders) {
        requestCode += "CURLOPT_HTTPHEADER => array(" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += "'" + key + ": " + options.getHeaders[key] + "'," + "\r\n";
        }
        requestCode += "),"+"\r\n";
    }

    requestCode += "));"+"\r\n";
    requestCode += "$response = curl_exec($curl);"+"\r\n";
    requestCode += "$err = curl_error($curl);"+"\r\n";
    requestCode += "curl_close($curl);"+"\r\n";
    requestCode += "if ($err) {"+"\r\n";
    requestCode += "   echo 'cURL Error #:' . $err;"+"\r\n";
    requestCode += "} else {"+"\r\n";
    requestCode += "   echo $response;"+"\r\n";
    requestCode += "}"+"\r\n";
    return requestCode;
}
function generatedPhp_FsockopenLanguage(options) {
    var requestCode = '<?php '+"\r\n\r\n";
    requestCode += "$options = array('http' =>"+"\r\n";
    requestCode += "        array("+"\r\n";
    requestCode += "            'method' => '"+options.method+"',"+"\r\n";
    requestCode += "            'timeout' => 50,"+"\r\n";

    if (options.getHeaders) {
        requestCode += "            'header' => ";          
        for (var key in options.getHeaders) {
            requestCode += "'" + key + ": " + options.getHeaders[key] + "'," + "\r\n";
        }
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "            'content' => "+ JSON.stringify(options.body) +"',"+"\r\n";
            } else {
                requestCode += "            'content' => '"+ $.param(options.body) +"',"+"\r\n";
            }
        }
    }

    requestCode += "        ),"+"\r\n";
    requestCode += "        'ssl' => array("+"\r\n";
    requestCode += "            'verify_peer' => false"+"\r\n";
    requestCode += "        )"+"\r\n";
    requestCode += "    );"+"\r\n";
    requestCode += "$context = stream_context_create($options);"+"\r\n";
    requestCode += "$json_response = @file_get_contents('"+options.url+'?'+$.param(options.getParams)+"', false, $context);"+"\r\n";
    requestCode += "echo $json_response;"+"\r\n";

    return requestCode;
}
//code for review
function generatedC_LibCurlLanguage(options) {
    var requestCode = 'CURL *hnd = curl_easy_init(); '+"\r\n\r\n";
    requestCode += "curl_easy_setopt(hnd, CURLOPT_CUSTOMREQUEST, \""+options.method+"\");"+"\r\n";
    requestCode += "curl_easy_setopt(hnd, CURLOPT_URL, \""+options.url+'?'+$.param(options.getParams)+"\");"+"\r\n";
    requestCode += "struct curl_slist *headers = NULL;"+"\r\n";
    
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "headers = curl_slist_append(headers, \""+key+": "+options.getHeaders[key]+"\");" + "\r\n";
        }
        requestCode += "curl_easy_setopt(hnd, CURLOPT_HTTPHEADER, headers);"+"\r\n";
    }
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += 'curl_easy_setopt(hnd, CURLOPT_POSTFIELDS, '+JSON.stringify(options.body)+';'+"\r\n";
            } else {
                requestCode += 'curl_easy_setopt(hnd, CURLOPT_POSTFIELDS, "'+ $.param(options.body) +'";'+"\r\n";
            }
        }
    }
    requestCode += "CURLcode ret = curl_easy_perform(hnd);"+"\r\n";

    return requestCode;
}
function generatedC_SharpLanguage(options) {
    var requestCode = 'var response = string.Empty;'+"\r\n\r\n";
    
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += 'var payload = '+JSON.stringify(options.body)+';'+"\r\n";
            } else {
                requestCode += "var payload = '"+ $.param(options.body) +"';"+"\r\n";
            }
        }
    }
    requestCode += 'var httpRequest = (HttpWebRequest)WebRequest.Create("'+options.url+'?'+$.param(options.getParams)+'");'+"\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            if(options.getHeaders[key] == 'application/json'){
                requestCode += 'httpRequest.ContentType = "application/json";'+"\r\n";
            }else if(options.getHeaders[key] == 'application/x-www-form-urlencoded'){
                requestCode += 'httpRequest.ContentType = "application/x-www-form-urlencoded";'+"\r\n";
            } else{
                requestCode += 'httpRequest.Headers["'+key+'"] = "'+options.getHeaders[key]+'";' + "\r\n";
            }
        }
    }
    requestCode += 'httpRequest.Method = "'+options.method+'";' + "\r\n";
    requestCode += 'try{' + "\r\n";
    if (options.bodyType) {
        if (options.body) {
            requestCode += '    var stream = httpRequest.GetRequestStream();' + "\r\n";
            requestCode += '    using (var writerStream = new StreamWriter(stream)){' + "\r\n";
            requestCode += '        writerStream.Write(payload);' + "\r\n";
            requestCode += '        writerStream.Flush();' + "\r\n";
            requestCode += '        writerStream.Close();' + "\r\n";
            requestCode += '    }' + "\r\n";
        }
    }
    requestCode += '    var webResponse = httpRequest.GetResponse();' + "\r\n";
    requestCode += '    using (var readerStream = new StreamReader(webResponse.GetResponseStream())){' + "\r\n";
    requestCode += '        response = readerStream.ReadToEnd();' + "\r\n";
    requestCode += '    }' + "\r\n";
    requestCode += '}' + "\r\n";
    requestCode += 'catch (WebException ex){' + "\r\n";
    requestCode += '    if (ex.Response != null){' + "\r\n";
    requestCode += '        using (var readerStream = new StreamReader(ex.Response.GetResponseStream())){' + "\r\n";
    requestCode += '            response = readerStream.ReadToEnd();' + "\r\n";
    requestCode += '        }' + "\r\n";
    requestCode += '    }' + "\r\n";
    requestCode += '}' + "\r\n";
    requestCode += 'Console.WriteLine(response);' + "\r\n";
    return requestCode;
}
function generatedC_RestSharpLanguage(options) {
    var requestCode = 'var client = new RestClient("'+options.url+'?'+$.param(options.getParams)+'");'+"\r\n\r\n";
    requestCode += "var request = new RestRequest(Method."+options.method+");"+"\r\n";
    
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += 'request.AddHeader("'+key+'", "'+options.getHeaders[key]+'");' + "\r\n";
        }
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "request.AddParameter(\"application/json\", '"+ options.body +"', ParameterType.RequestBody);"+"\r\n";
            } else {
                requestCode += "request.AddParameter(\"application/x-www-form-urlencoded\", '"+ $.param(options.body) +"', ParameterType.RequestBody);"+"\r\n";
            }
        }
    }
    requestCode += 'IRestResponse response = client.Execute(request);' + "\r\n";
    return requestCode;
}
function generatedGoLanguage(options) {
    var requestCode = 'package main'+"\r\n\r\n";
    requestCode += "import ("+"\r\n";
    requestCode += "    \"fmt\""+"\r\n";
    requestCode += "    \"strings\""+"\r\n";
    requestCode += "    \"net/http\""+"\r\n";
    requestCode += "    \"io/ioutil\""+"\r\n";
    requestCode += ")"+"\r\n";
    requestCode += "func main() {"+"\r\n";
    requestCode += '    url := "'+options.url+'?'+$.param(options.getParams)+'"'+"\r\n";

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += '    payload := strings.NewReader('+ JSON.stringify(options.body) +')'+"\r\n";
            } else {
                requestCode += '    payload := strings.NewReader(\''+ $.param(options.body) +'\')'+"\r\n";
            }
        }
    }
    
    requestCode += "    req, _ := http.NewRequest(\""+options.method+"\", url, payload)"+"\r\n";

    if (options.getHeaders) {         
        for (var key in options.getHeaders) {
            requestCode += "    req.Header.Add(\"" + key + "\",\"" + options.getHeaders[key] + '")' + "\r\n";
        }
    }
       
    requestCode += "    res, err := http.DefaultClient.Do(req)"+"\r\n";
    requestCode += "    if err != nil {"+"\r\n";
    requestCode += "        panic(err)"+"\r\n";
    requestCode += "    }"+"\r\n";
    requestCode += "    defer res.Body.Close()"+"\r\n";
    requestCode += "    body, _ := ioutil.ReadAll(res.Body)"+"\r\n";
    requestCode += "    fmt.Println(res)"+"\r\n";
    requestCode += "    fmt.Println(string(body))"+"\r\n";
    requestCode += "}"+"\r\n";
    return requestCode;
}
function generatedJava_OkHttpLanguage(options) {
    var requestCode = 'OkHttpClient client = new OkHttpClient();'+"\r\n\r\n";
    requestCode += 'MediaType mediaType = MediaType.parse("application/octet-stream");'+"\r\n";
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {                
                requestCode += "RequestBody body = RequestBody.create(mediaType, "+ JSON.stringify(options.body) +")"+"\r\n";
            } else {
                requestCode += "RequestBody body = RequestBody.create(mediaType, '"+ $.param(options.body) +"')"+"\r\n";
            }
        }
    }

    requestCode += "Request request = new Request.Builder()"+"\r\n";
    requestCode += '    .url("'+options.url+'?'+$.param(options.getParams)+'")'+"\r\n";
    if (options.bodyType) {
        if (options.body) {
            requestCode += "    .post(body)"+"\r\n";
        }
    }

    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "    .addHeader(\""+key+"\", \""+options.getHeaders[key]+"\")"+"\r\n";
        }
    }

    
    requestCode += "    .build();"+"\r\n";
    requestCode += "try {"+"\r\n";
    requestCode += "    Response response = client.newCall(request).execute();"+"\r\n";
    requestCode += "} catch (IOException e) {"+"\r\n";
    requestCode += "    e.printStackTrace();"+"\r\n";
    requestCode += "}"+"\r\n";    
    return requestCode;
}
function generatedJava_UnirestLanguage(options) {
    var requestCode = 'HttpResponse<String> response = Unirest.post("'+options.url+'?'+$.param(options.getParams)+'")'+"\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "    .header('" + key + "', '" + options.getHeaders[key] + "')" + "\r\n";
        }
    }
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "    .body('"+ options.body +"')"+"\r\n";
            } else {
                requestCode += "    .body('"+ $.param(options.body) +"')"+"\r\n";
            }
        }
    }
    requestCode += '    .asString();';
    return requestCode;
}
function generatedJava_HttpURLConnectionLanguage(options) {
    var requestCode = "try {"+"\r\n";
    requestCode += "    HttpURLConnection.setFollowRedirects(true);"+"\r\n";
    requestCode += '    HttpURLConnection connect = (HttpURLConnection) new URL("'+options.url+'?'+$.param(options.getParams)+'").openConnection();'+"\r\n";
    requestCode += '    connect.setRequestMethod("'+options.method+'");'+"\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += '    connect.setRequestProperty("'+key+'", "'+options.getHeaders[key]+'");' + "\r\n";
        }
    }
    requestCode += '    connect.setDoOutput(true);'+"\r\n";

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += '    String body = '+JSON.stringify(options.body)+';'+"\r\n";
            } else {
                requestCode += '    String body = '+$.param(options.body)+';'+"\r\n";
            }
            requestCode += "    OutputStream outputStream = connect.getOutputStream();"+"\r\n";
            requestCode += "    OutputStreamWriter writer = new OutputStreamWriter(outputStream, \"UTF-8\");"+"\r\n";
            requestCode += "    writer.write(body);"+"\r\n";
            requestCode += "    writer.flush();"+"\r\n";
            requestCode += "    writer.close();"+"\r\n";
        }
    }
    
    
    requestCode += "    BufferedReader reader = new BufferedReader(new InputStreamReader(connect.getResponseCode() == 200 ? connect.getInputStream() : connect.getErrorStream()));"+"\r\n";
    requestCode += "    String output,response=null;"+"\r\n";
    requestCode += "    while((output=reader.readLine())!=null) {"+"\r\n";
    requestCode += "        response = output;"+"\r\n";
    requestCode += "    }"+"\r\n";
    requestCode += "}catch(MalformedURLException e) {"+"\r\n";
    requestCode += "    e.printStackTrace();"+"\r\n";    
    requestCode += "}catch(SocketTimeoutException e) {"+"\r\n";
    requestCode += "    e.printStackTrace();"+"\r\n";
    requestCode += "}catch(IOException e) {"+"\r\n";
    requestCode += "    e.printStackTrace();"+"\r\n";
    requestCode += "}";
    return requestCode;
}
function generatedJs_AjaxLanguage(options) {
    var requestCode = 'var settings = {'+"\r\n";
    requestCode += '    "async": true,'+"\r\n";
    requestCode += '    "crossDomain": true,'+"\r\n";
    requestCode += '    "url": "'+options.url+'?'+$.param(options.getParams)+'",'+"\r\n";
    requestCode += '    "method": "'+options.method+'",'+"\r\n";

    if (options.getHeaders) {
        requestCode += '    "headers": {' + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += '"' + key + '" : "' + options.getHeaders[key] + '",' + "\r\n";
        }
        if(options.method == 'DELETE'){
            requestCode += '"Access-Control-Allow-Origin" : "*",' + "\r\n";
        }
        requestCode += "},"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += '    "data": '+ JSON.stringify(options.body) +"\r\n";
            } else {
                requestCode += '    "data": "'+ $.param(options.body) +'"'+"\r\n";
            }
        }
    }
    requestCode += "}"+"\r\n";
    requestCode += '$.ajax(settings).done(function (response) {'+"\r\n";
    requestCode += '    console.log(response);'+"\r\n";
    requestCode += '});'+"\r\n";
    return requestCode;
}
function generatedJs_XHRLanguage(options) {
    var requestCode = 'var xhr = new XMLHttpRequest();'+"\r\n";
    requestCode += "xhr.addEventListener(\"readystatechange\", function () {"+"\r\n";
    requestCode += "    if (this.readyState === 4) {"+"\r\n";
    requestCode += "        console.log(this.responseText);"+"\r\n";
    requestCode += "    }"+"\r\n";
    requestCode += "});"+"\r\n";

    requestCode += "xhr.open(\""+options.method+"\", \""+options.url+'?'+$.param(options.getParams)+"\");"+"\r\n";
    
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "xhr.setRequestHeader('" + key + "', '" + options.getHeaders[key] + "');" + "\r\n";
        }
        if(options.method == 'DELETE'){
            requestCode += 'xhr.setRequestHeader("Access-Control-Allow-Origin", "*");' + "\r\n";
        }
    }
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "xhr.send("+ JSON.stringify(options.body) +");"+"\r\n";
            } else {
                requestCode += "xhr.send('"+ $.param(options.body) +"');"+"\r\n";
            }
        }
    }else{
        requestCode += "xhr.send();";
    }
    return requestCode;
}
function generatedNodejs_NativeLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'var qs = require("querystring");'+"\r\n";
    requestCode += "var http = require(\""+location.protocol.replace(/\:/g, "")+"\");"+"\r\n";
    requestCode += "var options = {"+"\r\n";
    requestCode += '    "method": "'+options.method+'",'+"\r\n";
    requestCode += '    "hostname": "'+location.hostname+'",'+"\r\n";
    requestCode += '    "path": "'+location.pathname + '?' + $.param(options.getParams)+'",'+"\r\n";
    
    if (options.getHeaders) {
        requestCode += '    "headers": {' + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += '        "' + key + '": "' + options.getHeaders[key] + '",' + "\r\n";
        }
        requestCode += "    }"+"\r\n";
    }
    
    requestCode += "};"+"\r\n";
    requestCode += "var req = http.request(options, function (res) {"+"\r\n";
    requestCode += "    var chunks = [];"+"\r\n";
    requestCode += "    res.on(\"data\", function (chunk) {"+"\r\n";
    requestCode += "        chunks.push(chunk);"+"\r\n";
    requestCode += "    });"+"\r\n";
    requestCode += "    res.on(\"end\", function () {"+"\r\n";
    requestCode += "        var body = Buffer.concat(chunks);"+"\r\n";
    requestCode += "        console.log(body.toString());"+"\r\n";
    requestCode += "    });"+"\r\n";
    requestCode += "});"+"\r\n";

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += 'req.write(JSON.stringify('+options.body+'));'+ "\r\n";
            } else {
                requestCode += 'req.write(qs.stringify('+options.body+'));'+ "\r\n";
            }
        }
    }

    requestCode += "req.end();"+"\r\n";
    return requestCode;
}
function generatedNodejs_RequestLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'var request = require("request");'+"\r\n\r\n";
    requestCode += "var options = {"+"\r\n";
    requestCode += "    method: '"+options.method+"',"+"\r\n";
    requestCode += "    url: '"+options.url+"',"+"\r\n";
    if(options.getParams){
        requestCode += "    qs: "+JSON.stringify(options.getParams)+","+"\r\n";
    }
    if(options.getHeaders){
        requestCode += "    headers: "+JSON.stringify(options.getHeaders)+","+"\r\n";
    }  

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "    body: "+options.body+","+"\r\n";
                requestCode += "    json: true,"+"\r\n";
            } else {
                requestCode += "    form: "+options.body+","+"\r\n";
            }
        }
    }

    requestCode += "};"+"\r\n";

    requestCode += "request(options, function (error, response, body) {"+"\r\n";
    requestCode += "    console.log(body);"+"\r\n";
    requestCode += "});"+"\r\n";
    return requestCode;
}
function generatedNodejs_UnirestLanguage(options) {
    var requestCode = 'var unirest = require("unirest");'+"\r\n\r\n";
    requestCode += "var req = unirest(\""+options.method+"\", \""+options.url+"\");"+"\r\n";

    if (options.getParams) {
        requestCode += "req.query("+JSON.stringify(options.getParams)+")"+"\r\n";
    }

    if (options.getHeaders) {
        requestCode += "req.headers("+JSON.stringify(options.getHeaders)+")"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "req.type(\"json\");"+"\r\n";
            } else {
            }
            requestCode += "req.send("+options.body+")"+"\r\n";
        }
    }
    
    requestCode += "req.end(function (res) {"+"\r\n";
    requestCode += "    console.log(res.body);"+"\r\n";
    requestCode += "});"+"\r\n";
    return requestCode;
}
function generatedObjective_CLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = '#import <Foundation/Foundation.h>'+"\r\n\r\n";

    if (options.getHeaders) {
        requestCode += "NSDictionary *headers = @{ ";
        for (var key in options.getHeaders) {
            requestCode += '@"' + key + '": @"' + options.getHeaders[key] + '",' + "\r\n";
        }
        requestCode += "};"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            options.body = JSON.parse(options.body);
            if (options.bodyType == 'json') {
                requestCode += "NSDictionary *parameters ="+generateObjectiveCBody(options.body)+";"+"\r\n";
            } else {
                var count = 0;
                for (var key in options.body) {
                    if(count == 0){
                        requestCode += 'NSMutableData *postData = [[NSMutableData alloc] initWithData:[@"'+key+'='+options.body[key]+'" dataUsingEncoding:NSUTF8StringEncoding]];';
                        count++;
                    }else{
                        requestCode += '[postData appendData:[@"&'+key+'='+options.body[key]+'" dataUsingEncoding:NSUTF8StringEncoding]];';
                    }
                }                
            }
            requestCode += 'NSData *postData = [NSJSONSerialization dataWithJSONObject:parameters options:0 error:nil];'+"\r\n";
        }
    }

    requestCode += 'NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL:[NSURL URLWithString:@"'+options.url+'?'+$.param(options.getParams)+'"]'+"\r\n";
    requestCode += 'cachePolicy:NSURLRequestUseProtocolCachePolicy'+"\r\n";
    requestCode += 'timeoutInterval:10.0];'+"\r\n";
    requestCode += '[request setHTTPMethod:@"'+options.method+'"];'+"\r\n";
    requestCode += '[request setAllHTTPHeaderFields:headers];'+"\r\n";
    if (options.bodyType) {
        if (options.body) {
            requestCode += '[request setHTTPBody:postData];'+"\r\n";
        }
    }
    requestCode += 'NSURLSession *session = [NSURLSession sharedSession];'+"\r\n";
    requestCode += 'NSURLSessionDataTask *dataTask = [session dataTaskWithRequest:request'+"\r\n";
    requestCode += 'completionHandler:^(NSData *data, NSURLResponse *response, NSError *error) {'+"\r\n";

    requestCode += 'NSHTTPURLResponse *httpResponse = (NSHTTPURLResponse *) response;'+"\r\n";
    requestCode += 'if([httpResponse statusCode] == 200){'+"\r\n";
    requestCode += '    NSError *jsonError = nil;'+"\r\n";
    requestCode += '    id jsonObject = [NSJSONSerialization JSONObjectWithData:data options:kNilOptions error:&jsonError];'+"\r\n";
    requestCode += '    if ([jsonObject isKindOfClass:[NSArray class]]) {'+"\r\n";
    requestCode += '        NSArray *jsonArray = (NSArray *)jsonObject;'+"\r\n";
    requestCode += '        NSMutableDictionary *dict = [[NSMutableDictionary alloc] init];'+"\r\n";
    requestCode += '        [dict setObject:jsonArray forKey:@"Data"];'+"\r\n";
    requestCode += '        NSLog(@"resp %@",dict);'+"\r\n";
    requestCode += '    }'+"\r\n";
    requestCode += '    else {'+"\r\n";
    requestCode += '        NSDictionary *jsonDictionary = (NSDictionary *)jsonObject;'+"\r\n";
    requestCode += '        NSLog(@"resp %@",jsonDictionary);'+"\r\n";
    requestCode += '    }'+"\r\n";
    requestCode += '}else{'+"\r\n";
    requestCode += '    NSError *jsonError = nil;'+"\r\n";
    requestCode += '    id jsonObject = [NSJSONSerialization JSONObjectWithData:data options:kNilOptions error:&jsonError];'+"\r\n";
    requestCode += '    NSDictionary *error = (NSDictionary *)jsonObject;'+"\r\n";
    requestCode += '    NSLog(@"error %@",error);'+"\r\n";
    requestCode += '}'+"\r\n";
    
    requestCode += '}];'+"\r\n";
    requestCode += '[dataTask resume];'+"\r\n";
    return requestCode;
}
function generateObjectiveCBody(data){
    var requestCode = '@{';
    for (var key in data) {
        requestCode += '@"' + key + '": ';
        if(typeof data[key] == "object"){
            requestCode += generateObjectiveCBody(data[key]);
        }else{
            requestCode += '@"' + data[key] + '"';
        }
        requestCode += ',';
    }
    
    return requestCode.slice(0,-1)+'}';
}
function generateSwiftBody(data){
    var requestCode = '[';
    for (var key in data) {
        requestCode += '"' + key + '": ';
        if(typeof data[key] == "object"){
            requestCode += generateSwiftBody(data[key]);
        }else{
            requestCode += '"' + data[key] + '"';
        }
        requestCode += ',';
    }
    
    return requestCode.slice(0,-1)+']';
}
function generatedCo_HttpLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'open Cohttp_lwt_unix'+"\r\n\r\n";
    requestCode += "open Cohttp"+"\r\n";
    requestCode += "open Lwt"+"\r\n";
    requestCode += "let uri = Uri.of_string \""+options.url+'?'+$.param(options.getParams)+"\" in"+"\r\n";

    if (options.getHeaders) {
        requestCode += "let headers = Header.init ()" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += '    |> fun h -> Header.add h "' + key + '" "' + options.getHeaders[key] + '"' + "\r\n";
        }
        requestCode += "in"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += 'let body = Cohttp_lwt_body.of_string "'+options.body+'" in'+ "\r\n";
            } else {
                requestCode += 'let body = Cohttp_lwt_body.of_string "'+$.param(options.body)+'" in'+ "\r\n";
            }
        }
    }
    requestCode += "Client.call ~headers ~body `"+options.method+" uri"+"\r\n";
    requestCode += ">>= fun (res, body_stream) ->"+"\r\n";
    requestCode += "  (* Do stuff with the result *)";
    
    return requestCode;
}
function generatedPython_HttpClientLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'import http.client'+"\r\n";
    requestCode += 'conn = http.client.HTTPSConnection("'+location.hostname+'")'+"\r\n";

    if (options.getHeaders) {
        requestCode += "headers = {" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += "'" + key + "': '" + options.getHeaders[key] + "'," + "\r\n";
        }
        requestCode += "}"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += 'payload = '+JSON.stringify(options.body) +"\r\n";
            } else {
                requestCode += 'payload = "'+ $.param(options.body) +'"'+"\r\n";
            }
        }
    }
    
    requestCode += "conn.request(\""+options.method+"\", \""+location.pathname+'?'+$.param(options.getParams)+"\", ";
    if (options.bodyType) {
        if (options.body) {
            requestCode += "payload, ";
        }else{
            requestCode += "headers=";
        }
    }else{
        requestCode += "headers=";
    }
    requestCode += "headers)"+"\r\n";
    requestCode += "res = conn.getresponse()"+"\r\n";
    requestCode += "data = res.read()"+"\r\n";
    requestCode += "print(data.decode(\"utf-8\"))"+"\r\n";
    return requestCode;
}
function generatedPython_RequestsLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'import requests'+"\r\n\r\n";
    requestCode += 'url = "'+options.url+'"'+"\r\n";

    if (options.getParams) {
        requestCode += "querystring = "+JSON.stringify(options.getParams)+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "payload = "+ JSON.stringify(options.body) +"\r\n";
            } else {
                requestCode += "payload = '"+ $.param(options.body) +"'"+"\r\n";
            }
        }
    }

    if (options.getHeaders) {
        requestCode += "headers = {" + "\r\n";          
        for (var key in options.getHeaders) {
            requestCode += "    '" + key + "': '" + options.getHeaders[key] + "'," + "\r\n";
        }
        requestCode += "}"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            requestCode += 'response = requests.request("'+options.method+'", url, data=payload, headers=headers, params=querystring)'+"\r\n";
        }else{
            requestCode += 'response = requests.request("'+options.method+'", url, headers=headers, params=querystring)'+"\r\n";
        }
    }else{
        requestCode += 'response = requests.request("'+options.method+'", url, headers=headers, params=querystring)'+"\r\n";
    }
    requestCode += 'print(response.text)'+"\r\n";
    return requestCode;
}
function generatedRubyLanguage(options) {
    var requestCode = "require 'uri'"+"\r\n";
    requestCode += "require 'net/http'"+"\r\n";
    requestCode += "url = URI('"+options.url+'?'+$.param(options.getParams)+"')"+"\r\n";
    requestCode += "http = Net::HTTP.new(url.host, url.port)"+"\r\n";
    requestCode += "http.use_ssl = true"+"\r\n";
    requestCode += "http.verify_mode = false"+"\r\n";
    requestCode += "request = Net::HTTP::";
    if(options.method == 'DELETE'){
        requestCode += 'Delete';
    }else if(options.method == 'POST'){
        requestCode += 'Post';
    }else if(options.method == 'PUT'){
        requestCode += 'Put';
    }else{
        requestCode += 'Get';
    }
    requestCode += ".new(url)"+"\r\n";

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "request.body = "+ JSON.stringify(options.body) +"\r\n";
            } else {
                requestCode += 'request.body = "'+ $.param(options.body) +'"'+"\r\n";
            }
        }
    }

    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "request['"+key+"'] = '"+options.getHeaders[key]+"'" + "\r\n";
        }
    }

    requestCode += "response = http.request(request)"+"\r\n";
    requestCode += "puts response.read_body"+"\r\n";
    return requestCode;
}
function generatedShell_WgetLanguage(options) {
    var requestCode = 'wget --quiet \\'+"\r\n";
    requestCode += "    --method "+options.method+" \\"+"\r\n";

    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "    --header '"+ key+": " + options.getHeaders[key] +"' \\"+"\r\n";
        }
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "    --body-data "+ JSON.stringify(options.body) +" \\"+"\r\n";
            } else {
                requestCode += "    --body-data  '"+ $.param(options.body) +"' \\"+"\r\n";
            }
        }
    }

    requestCode += "    --output-document \\"+"\r\n";
    requestCode += "    - '"+options.url+'?'+$.param(options.getParams)+"'"+"\r\n";
    return requestCode;
}
function generatedShell_HttpieLanguage(options) {
    var requestCode = '';
    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "echo "+ JSON.stringify(options.body) +" | \\"+"\r\n";
            } else {
                for (var key in options.body) {
                    requestCode += "    " + key + ": " + options.body[key] + " | \\" + "\r\n";
                }
            }
        }
    }
    var location = parseURLLocation(options.url);
    requestCode += "http --form "+options.method+" '"+options.url+'?'+$.param(options.getParams)+"' \\"+"\r\n";

    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "    " + key + ":" + options.getHeaders[key] + " \\" + "\r\n";
        }
    }
    return requestCode;
}
function generatedShell_CurlLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'curl --request '+options.method+' \\'+"\r\n\r\n";
    requestCode += "--url '"+options.url+'?'+$.param(options.getParams)+"' \\"+"\r\n";
    if (options.getHeaders) {
        for (var key in options.getHeaders) {
            requestCode += "--header '"+key+": "+options.getHeaders[key]+"' \\"+"\r\n";
        }
    }

    if (options.bodyType) {
        if (options.body) {
            if (options.bodyType == 'json') {
                requestCode += "--data '"+ options.body +"'"+"\r\n";
            } else {
                requestCode += "--data '"+ $.param(options.body) +"'"+"\r\n";
            }
        }
    }

    return requestCode;
}
function generatedSwiftLanguage(options) {
    var location = parseURLLocation(options.url);
    var requestCode = 'import Foundation'+"\r\n\r\n";

    if (options.getHeaders) {
        requestCode += "let headers = [" + "\r\n";          
        requestCode += JSON.stringify(options.getHeaders).slice(1, -1);
        requestCode += "]"+"\r\n";
    }

    if (options.bodyType) {
        if (options.body) {
            options.body = JSON.parse(options.body);
            if (options.bodyType == 'json') {
                requestCode += "let parameters = ";          
                requestCode += generateSwiftBody(options.body);
                requestCode += " as [String : Any]"+"\r\n";                
                requestCode += 'let postData = try? JSONSerialization.data(withJSONObject: parameters, options: [])'+"\r\n";
            } else {
                var count = 0;
                for (var key in options.body) {
                    if(count == 0){
                        requestCode += 'let postData =  try? NSMutableData(data: "'+key+'='+options.body[key]+'".data(using: String.Encoding.utf8)!)'+"\r\n";
                        count++;
                    }else{
                        requestCode += ' try? postData.append("&'+key+'='+options.body[key]+'".data(using: String.Encoding.utf8)!)'+"\r\n";
                    }
                }
            }
        }
    }

    requestCode += 'let request = NSMutableURLRequest(url: NSURL(string: "'+options.url+'?'+$.param(options.getParams)+'")! as URL,'+"\r\n";
    requestCode += "cachePolicy: .useProtocolCachePolicy,"+"\r\n";
    requestCode += "timeoutInterval: 10.0)"+"\r\n";
    requestCode += 'request.httpMethod = "'+options.method+'"'+"\r\n";
    requestCode += 'request.allHTTPHeaderFields = headers'+"\r\n";
    if (options.bodyType) {
        if (options.body) {
            requestCode += 'request.httpBody = postData as! Data'+"\r\n";
        }
    }
    requestCode += 'let session = URLSession.shared'+"\r\n";
    requestCode += 'let dataTask = session.dataTask(with: request as URLRequest, completionHandler: { (data, response, error) -> Void in'+"\r\n";
    requestCode += 'do {'+"\r\n";
    requestCode += '    let json = try JSONSerialization.jsonObject(with: data!, options: .allowFragments) as! [String:Any]'+"\r\n";
    requestCode += '    print(json)'+"\r\n";
    requestCode += '} catch let error as NSError {'+"\r\n";
    requestCode += '    print(error)'+"\r\n";
    requestCode += '}'+"\r\n";
    requestCode += '})'+"\r\n";
    requestCode += 'dataTask.resume()'+"\r\n";
    return requestCode;
}