var correctCaptcha = function() {
    $("#contact form button").prop("disabled", true).removeAttr("disabled");
};

var invalid = function() {
    $("#contact form button").prop("disabled", true);
};

jQuery(document).ready(function() {
    $("#formContact").on("submit", function() {
        event.preventDefault();

        $("#formContact button").prop("disabled", true).attr("class", "attente");

        var nom = $("#formContact #nom").val();
        var prenom = $("#formContact #prenom").val();
        var mail = $("#formContact #mail").val();
        var text = $("#formContact #text").val();
        var captcha = grecaptcha.getResponse();

        if (nom.length > 0 && prenom.length > 0 && mail.length > 0 && text.length > 0 && captcha.length > 0) {
            
            $.ajax({
                url: "index.php",
                type : 'POST',
                data : {
                    "app" : "mail",
                    "nom" : nom,
                    "prenom" : prenom,
                    "mail" : mail,
                    "text" : text,
                    "captcha": captcha
                 },
                dataType: 'json',
            }).done(function(data) {
                if (typeof data == 'object') {
                    if (data.resultat){
                        Valid();
                    }else{
                        console.error(data.info);
                        error();
                    }
                }else {
                    console.error("donner recu non attendue");
                    error();
                }
            }).fail(function (data) {
                console.error("erreur critique");
                error();
            });
        }else {
            console.error("formulaire non valide");
            error();
        }
    });
});

function error() {
    $("#formContact button").attr("class", "false");
    grecaptcha.reset();
    setTimeout(function() {
        $("#formContact button").attr("class", "");
    }, 3000);
}

function Valid() {
    $("#formContact button").attr("class", "true");
    document.querySelector("#formContact").reset();
    grecaptcha.reset();
    setTimeout(function() {
        $("#formContact button").attr("class", "");
    }, 3000);
}