jQuery(document).ready(function() {
    var section = "#portfolio .sites section";

   for (index = 1; index <= $(section).length; index++) {
        var nbSection = index - 1;
        var urlBackground = $($(section)[nbSection]).attr("data-site");

        $($(section)[nbSection]).css("background-image", "url(view/src/data_site/" + urlBackground + ")");
   }
});