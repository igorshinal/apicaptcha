$(function() {
    "use strict";
    setTimeout(function() {
            $('html').addClass('loaded');
        }, 200);
    $('.dropdown-btn').on('click', function () {
       $('.content').toggle();
    });
    $(".common-wrap ").on('click', function(e) {
        if($(e.target).closest(".content").length==0) $(".content").css("display","none");

    });
});
