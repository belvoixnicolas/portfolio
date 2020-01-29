jQuery(document).ready(function() {
    changeClassNav($(window).scrollTop());

    $(window).scroll(function() {
        changeClassNav($(window).scrollTop());
    });
});

function changeClassNav (scrollTop) {
    if (scrollTop >= 60) {
        $("#nav").removeClass("hidden").addClass("show");
    }else {
        $("#nav").removeClass("show").addClass("hidden");
        
        if ($("#nav ul").hasClass("hidden") != true) {
            $("#nav ul").addClass("hidden");
            $("nav #menuburger i").attr("class", "fas fa-bars");
        }
    }
}