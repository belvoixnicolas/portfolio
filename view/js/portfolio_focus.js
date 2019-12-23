jQuery(document).ready(function() {
    $("#portfolio .sites section").click(function(){
        $("#siteInfo").removeClass("hidden");
    });

    $("#siteInfo #fermer").click(function() {
        $('#siteInfo').addClass("hidden");
    });
});