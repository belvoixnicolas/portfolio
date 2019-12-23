jQuery(document).ready(function() {
    $("nav #menuburger").click(function(){
        var classI = $(this).children("i").attr('class');

        if (classI == "fas fa-bars") {
            $(this).children("i").attr("class", "fas fa-times");
            $("nav ul").removeClass("hidden");
        }else {
            $(this).children("i").attr("class", "fas fa-bars");
            $("nav ul").addClass("hidden");
        }
    });

    $("nav ul li").click(function(){
        $("nav #menuburger i").attr("class", "fas fa-bars");
        $("nav ul").addClass("hidden");
    });
});