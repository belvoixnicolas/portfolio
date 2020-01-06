jQuery(document).ready(function() {
    stopAndStartAnim($(window).scrollTop());

    $(window).scroll(function() {
        stopAndStartAnim($(window).scrollTop());
    });
});

function stopAndStartAnim (scrollTop) {
    if (scrollTop >= 60) {
        $("header").removeClass("anim");
    }else {
        $("header").addClass("anim");
    }
}