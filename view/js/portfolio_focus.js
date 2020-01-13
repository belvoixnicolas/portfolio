jQuery(document).ready(function() {
    $("#portfolio .sites section").click(function(){
        //$("#siteInfo").removeClass("hidden");

        setTimeout(function() {
            $("#siteInfo").removeClass("hidden");
        }, 2000);
    });

    $("#siteInfo #fermer").click(function() {
        $('#siteInfo').addClass("hidden");
    });
});