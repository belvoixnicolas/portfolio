jQuery(document).ready(function() {
    $("#siteInfo .conteneur").hover(function() {
        $("#siteInfo").attr("hover", "true");
    }, function() {
        $("#siteInfo").attr("hover", "false");
    });
});