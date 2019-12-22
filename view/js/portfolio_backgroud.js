jQuery(document).ready(function() {
    var section = "#portfolio .sites section";

   console.log("Nombre de card: " + $(section).length);

   for (let index = 1; index <= $(section).length; index++) {
        var nbSection = index - 1;
        var urlBackground = $($(section)[nbSection]).attr("data-site");

        console.log("Nom de l'image: " + urlBackground);

        $($(section)[nbSection]).css("background-image", "url(view/src/data_site/" + urlBackground + ")");
   }
});