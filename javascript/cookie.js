jQuery(document).ready(function() {
    changeClassCookie($(window).scrollTop());

    $(window).scroll(function() {
        changeClassCookie($(window).scrollTop());
    });

    $("#cookie #validCookie").click(function() {
        $("#cookie").removeClass("show").addClass("hidden");

        $.ajax({
            url: "cookie.php",
            dataType: "json"
        }).done(function (data) {
            if (typeof data == "boolean" && data) {
                setTimeout(function() {
                    $("#cookie").remove();
                }, 1000);
            }else {
                console.error("resultat non attendue");
                
                setTimeout(function() {
                    $("#cookie").remove();
                }, 1000);
            }
        }).fail(function () {
            console.error("echec cookie");
            
            setTimeout(function() {
                $("#cookie").remove();
            }, 1000);
        });
    });
});

function changeClassCookie (scrollTop) {
    if (scrollTop >= 60) {
        $("#cookie").removeClass("hidden").addClass("show");
    }else {
        $("#cookie").removeClass("show").addClass("hidden");
    }
}