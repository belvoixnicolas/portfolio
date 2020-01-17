var correctCaptcha = function() {
    $("#contact form button").prop("disabled", true).removeAttr("disabled");
}

var invalid = function() {
    $("#contact form button").prop("disabled", true);
}

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
            console.log("debut de l'envoie");
            $.ajax({
                url: "captcha.php",
                type : 'POST',
                data : {"response" : captcha},
                dataType: 'json',
            }).done(function(data) {
                if (typeof data == 'object') {
                    if (data.success === true && text != "false") {
                        console.log("valid");
                        Valid();
                    }else if (data.success === true && text == "false") {
                        console.log("erreur programmer");
                        error();
                    }else{
                        console.log("erreur captcha");
                        console.log(data);
                        error();
                    }
                }else {
                    console.log("donner non attendue");
                    console.log(data);
                    error();
                }
                console.log(typeof data);
            }).fail(function (data) {
                console.log("erreur critique");
                console.log(data);
                error();
            });
        }else {
            console.log("formulaire non valide");
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