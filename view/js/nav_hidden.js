jQuery(document).ready(function() {
    changeClass($(window).scrollTop());

    $(window).scroll(function() {
        changeClass($(window).scrollTop());
    });
});

function changeClass (scrollTop) {
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