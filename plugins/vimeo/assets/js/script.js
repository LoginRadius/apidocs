jQuery(document).ready(function ($) {
    $(".c-play-b,.customer_video_loading").click(function () {
        $(".video_popout").css("display", "flex");
    });
    $(".video_popout,#close_full_video").click(function () {
        $(".video_popout").css("display", "none");
    });
    $('.customer_video_loading').click(function () {
        var iframe = $(this).find('.video-iframe').val();
        $('.video_popout .video').html(iframe + '<i id="close_full_video" class="material">close</i>');
        $('#close_full_video').click(function () {
            $('.video_popout').hide();
        });
    });
    $(".video_popout,#close_full_video").click(function () {
        $('.video_popout .video').html('<i id="close_full_video" class="material">close</i>');
    });
});