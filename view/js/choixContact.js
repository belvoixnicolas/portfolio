jQuery(document).ready(function() {
    $("#contact menu #buttonFormulaire").click(function() {
        $(this).attr("class", "focus");
        $("#contact menu #buttonContact").attr("class", "");

        $("#contact .contact").addClass("hidden");
        $("#contact .formulaire").removeClass("hidden");
    });

    $("#contact menu #buttonContact").click(function() {
        $(this).attr("class", "focus");
        $("#contact menu #buttonFormulaire").attr("class", "");

        $("#contact .formulaire").addClass("hidden");
        $("#contact .contact").removeClass("hidden");
    });
});