$(document).ready(popupClose);
$("#previewcontainer").markdown({
    fullscreen: false,
    hiddenButtons: ['cmdPreview', 'cmdImage'],
    iconlibrary: 'fa',
    autofocus: true,
    onShow: function (e) {
        e.change(e);
    },
    onChange: function (e) {
        var content = e.parseContent();
        $('#mdcontainer').html(content);
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
            $(this).before().click(function(){
                setClipboard($(this).text());
            });
        });
        
        $('.tabssections .tabs span').click(function(){
            var clickedTab = ($(this).text());
            $('.tabsarea').children().removeClass('active');
            $('.tabsarea').children().addClass('deactive');
            $('.tabssections .tabs span').removeClass('active');
            $('.tabssections .tabs span').addClass('deactive');
            $(this).removeClass('deactive');
            $(this).addClass('active');
            $('.tabsarea').children().each(function(){
                if($(this).attr('tabarea') == clickedTab){
                    $(this).removeClass('deactive');
                    $(this).addClass('active');
                }
            });
        });
        
    },
    additionalButtons: [
        [{
                name: "groupLink",
                data: [{
                        name: "cmdCloudUpload",
                        toggle: true, // this param only take effect if you load bootstrap.js
                        title: "Image Upload",
                        icon: "glyphicon glyphicon-picture",
                        callback: function (e) {
                            // Give ![] surround the selection and prepend the image link
                            var chunk, cursor, selected = e.getSelection(),
                                    content = e.getContent(),
                                    link;

                            if (selected.length === 0) {
                                // Give extra word
                                chunk = e.__localize('enter image description here');
                            } else {
                                chunk = selected.text;
                            }
                            document.getElementById('imageUploader').style.display = "block";
                            imageUploader('demoFiler', function (data) {
                                var response = JSON.parse(data);
                                alert(response.message);
                                document.getElementById("multiUpload").value = "";
                                if (response.status == "success") {
                                    document.getElementById('imageUploader').style.display = "none";
                                    link = response.url;
                                    if (link !== null && link !== '' && link !== 'http://') {
                                        var sanitizedLink = $('<div>' + link + '</div>').text();

                                        // transform selection and set the cursor into chunked text
                                        e.replaceSelection('![' + chunk + '](' + sanitizedLink + ' "' + e.__localize('enter image title here') + '")');
                                        cursor = selected.start + 2;

                                        // Set the next tab
                                        e.setNextTab(e.__localize('enter image title here'));

                                        // Set the cursor
                                        e.setSelection(cursor, cursor + chunk.length);
                                        e.change(e);
                                    }
                                }
                            });
                        }
                    }]
            }, {
                name: "groupFont",
                data: [{
                        name: "cmdStrikethrough",
                        toggle: true, // this param only take effect if you load bootstrap.js
                        title: "Strikethrough Text",
                        icon: "fa fa-strikethrough",
                        callback: function (e) {

                            // Give/remove ~~ surround the selection
                            var chunk, cursor, selected = e.getSelection(),
                                    content = e.getContent();

                            if (selected.length === 0) {
                                // Give extra word
                                chunk = e.__localize('strong text');
                            } else {
                                chunk = selected.text;
                            }

                            // transform selection and set the cursor into chunked text
                            if (content.substr(selected.start - 2, 2) === '~~' &&
                                    content.substr(selected.end, 2) === '~~') {
                                e.setSelection(selected.start - 2, selected.end + 2);
                                e.replaceSelection(chunk);
                                cursor = selected.start - 2;
                            } else {
                                e.replaceSelection('~~' + chunk + '~~');
                                cursor = selected.start + 2;
                            }

                            // Set the cursor
                            e.setSelection(cursor, cursor + chunk.length);
                        }
                    }]
            }, {
                name: "groupFont",
                data: [{
                        name: "cmdHorizontalRule",
                        toggle: true, // this param only take effect if you load bootstrap.js
                        title: "Horizontal Rule",
                        icon: "fa fa-ellipsis-h",
                        callback: function (e) {

                            // Give/remove ---------- surround the selection
                            var chunk, cursor, selected = e.getSelection(),
                                    content = e.getContent();

                            e.replaceSelection("\n\n" + '------- ' + "\n");
                            // Set the cursor
                            e.setSelection(cursor, cursor.length);
                            e.change(e);
                        }
                    }]
            }, {
                name: "groupFont",
                data: [{
                        name: "cmdDocumentTitle",
                        toggle: true, // this param only take effect if you load bootstrap.js
                        title: "Document Title",
                        icon: "fa fa-file-text",
                        callback: function (e) {

                            // Give/remove ---------- surround the selection
                            var chunk, cursor, selected = e.getSelection(),
                                    content = e.getContent();

                            if (selected.length === 0) {
                                // Give extra word
                                chunk = e.__localize('strong text');
                            } else {
                                chunk = selected.text;
                            }

                            // transform selection and set the cursor into chunked text

                            e.replaceSelection(chunk + "\n" + '=====');
                            cursor = selected.start + 2;


                            // Set the cursor
                            e.setSelection(cursor, cursor + chunk.length);
                        }
                    }]
            }, {
                name: "groupLink",
                data: [{
                        name: "cmdVideo",
                        toggle: true, // this param only take effect if you load bootstrap.js
                        title: "Video",
                        icon: "fa fa-video-camera",
                        callback: function (e) {
                            // Give [] surround the selection and prepend the link
                            var chunk, cursor, selected = e.getSelection(),
                                    content = e.getContent(),
                                    link, width, height;

                            if (selected.length === 0) {
                                // Give extra word
                                chunk = e.__localize('enter link description here');
                            } else {
                                chunk = selected.text;
                            }

                            link = prompt(e.__localize('Insert Hyperlink'), 'http://');
                            width = prompt(e.__localize('Insert iFrame width'), '1152');
                            height = prompt(e.__localize('Insert iFrame height'), '620');

                            var urlRegex = new RegExp('^((http|https)://|(mailto:)|(//))[a-z0-9]', 'i');
                            if (link !== null && link !== '' && link !== 'http://' && urlRegex.test(link)) {

                                // transform selection and set the cursor into chunked text
                                e.replaceSelection('<iframe src="' + link + '" width="' + width + '" height="' + height + '" scrolling="no" frameborder="0" allowfullscreen=""></iframe>');
                                cursor = selected.start + 1;

                                // Set the cursor
                                e.setSelection(cursor, cursor + chunk.length);
                            }
                        }
                    }]
            }]
    ]
});

function imageUploader(fieldId, callbackHandler) {
    var send = true;
    $('#' + fieldId).on('submit', (function (e) {
        if (send) {
            $("#processBar").show();
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                xhr: function () {
                    //upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            $("#processBar .status").css("width", percent + "%");
                            $("#submitHandler").attr("disable", true);
                        }, true);
                    }
                    return xhr;
                },
                mimeType: "multipart/form-data"
            }).done(function (data) {
                callbackHandler(data);
                $("#submitHandler").attr("disable", true);
                $("#processBar").hide();
            });

            send = false;
        }
    }));
}
function popupClose() {
    $('#popupClose').click(function () {
        $("#imageUploader").hide();
    });
}
