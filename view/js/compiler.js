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
            console.log("debut de l'envoie");
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
                console.log("cookie envoyer");
                
                setTimeout(function() {
                    $("#cookie").remove();
                }, 1000);
            }else {
                console.log("resultat non attendue");
                
                setTimeout(function() {
                    $("#cookie").remove();
                }, 1000);
            }
        }).fail(function () {
            console.log("echec");
            
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
jQuery(document).ready(function() {
    stopAndStartAnim($(window).scrollTop());

    $(window).scroll(function() {
        stopAndStartAnim($(window).scrollTop());
    });
});

function stopAndStartAnim (scrollTop) {
    if (scrollTop >= 60) {
        $("header").removeClass("anim");
    }else {
        $("header").addClass("anim");
    }
}
jQuery(document).ready(function() {
    changeClassNav($(window).scrollTop());

    $(window).scroll(function() {
        changeClassNav($(window).scrollTop());
    });
});

function changeClassNav (scrollTop) {
    if (scrollTop >= 60) {
        $("#nav").removeClass("hidden").addClass("show");
    }else {
        $("#nav").removeClass("show").addClass("hidden");
        
        if ($("#nav ul").hasClass("hidden") != true) {
            $("#nav ul").addClass("hidden");
            $("nav #menuburger i").attr("class", "fas fa-bars");
        }
    }
}
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
jQuery(document).ready(function() {
    var section = "#portfolio .sites section";

   for (index = 1; index <= $(section).length; index++) {
        var nbSection = index - 1;
        var urlBackground = $($(section)[nbSection]).attr("data-site");

        $($(section)[nbSection]).css("background-image", "url(view/src/data_site/" + urlBackground + ")");
   }
});
jQuery(document).ready(function() {
    $("#portfolio .sites section").click(function(){
        var id = $(this).attr("data-id");

        if (id.length > 0 && id != "" && typeof id != "undefined") {
            $.ajax({
                url: "index.php",
                type : 'POST',
                data : {"app" : "site", "action" : "1", "siteId" : id},
                dataType: 'json',
            }).done(function(data) {
                if (typeof data == 'object') {
                    if (data.titre != "" && data.titre !== null) {
                        $("#siteInfo #titreSite").text(data.titre);
                    }else {
                        $("#siteInfo #titreSite").text("Titre du site");
                    }
                    
                    if (data.img != "" && data.img !== null) {
                        $("#siteInfo #imgSite").attr("src", "view/src/data_site/" + data.img).attr("alt", "Capture d'écran de \"" + $("#siteInfo #titreSite").text() + "\"");

                        if (data.imgOrientation == "portrai") {
                            $("#siteInfo #imgSite").attr("format", "hauteur");
                        }else {
                            $("#siteInfo #imgSite").attr("format", "largeur");
                        }
                    }else {
                        $("#siteInfo #imgSite").attr("src", "view/src/img/site_defaut.jpg").attr("alt", "Capture d'écran non disponible");
                    }

                    if (data.description != "" && data.description !== null) {
                        $("#siteInfo #txtSite").text(data.description);
                    }else {
                        $("#siteInfo #txtSite").text("Aucune description.");
                    }

                    if (typeof data.tag == "object" && data.tag !== null) {
                        var tag = data.tag;

                        for (index = 0; index < tag.length; index++) {
                            $("#siteInfo #tagSite").append("<li>" + tag[index] + "</li>");
                        }
                    }

                    if (data.url != "" && data.url !== null) {
                        if (data.type == "app") {
                            $("#siteInfo #linkSite").attr("href", "view/src/apk/" + data.url);
                            $("#siteInfo #linkSite").attr("download", data.titre + ".apk");
                        }else {
                            $("#siteInfo #linkSite").attr("href", data.url);
                        }

                        if (data.id > 0 && data.id !== null) {
                            $("#siteInfo #linkSite").attr("data", data.id);
                        }
                    }else {
                        $("#siteInfo #linkSite").css("display", "none");
                    }

                    $("#siteInfo").removeClass("hidden");
                }else {
                    console.error("Les information sur le site n'on pas put étre charger");
                    alert("une erreur c'est produi");
                }
            }).fail(function (data) {
                console.error("Les information sur le site n'on pas put étre charger");
                alert("une erreur c'est produit");
            });
        }
    });

    $("#siteInfo").on("click", "#linkSite", function() {
        var id = $("#siteInfo #linkSite").attr("data");

        if (id.length > 0 && id != "" && typeof id != "undefined") {
            $.ajax({
                url: "index.php",
                type : 'POST',
                data : {"app" : "site", "action" : "2", "siteId" : id},
                dataType: 'json',
            });
        }
    });

    $("#siteInfo #fermer").click(function() {
        $('#siteInfo').addClass("hidden");

        setTimeout(function () {
            $("#siteInfo #titreSite").text("");
            $("#siteInfo #imgSite").attr("src", "").attr("alt", "").attr("format", "");
            $("#siteInfo #txtSite").text("");
            $("#siteInfo #tagSite").html("");
            $("#siteInfo #linkSite").attr("style", "").attr("href", "").attr("data", "").removeAttr("download");
        } ,600);
    });
});
jQuery(document).ready(function() {
    var list = init();

    verifScroll(list);

    $(window).scroll(function() {
        verifScroll(list);
    });

    $(window).resize(function() {
        updateList(list);
    });
});

function init () {
    var classScroll = $(".scrollanim");
    var listeParam = [];

    for (let index = 0; index < classScroll.length; index++) {
        let dom = classScroll[index];
        let position = $(dom).offset();
        let animation = "";
        let animationAttr = $(dom).attr("scroll_anim_css");
        let duration = "1";
        let durationAttr = $(dom).attr("scroll_anim_duration");
        let delay = "0";
        let delayAttr = $(dom).attr("scroll_anim_delay");
        let height = 50;
        let heightAttr = $(dom).attr("scroll_anim_height");

        if (animationAttr) {
            animation = animationAttr;
        }

        if (durationAttr) {
            duration = durationAttr;
        }

        if (delayAttr) {
            delay = delayAttr;
        }

        if (heightAttr) {
            height = heightAttr;
        }

        $(dom).fadeTo("0", 0);

        var array = {"position" : position.top, "dom" : dom, "height" : height, "animation" : animation, duration : duration, delay : delay, afficher : false};

        listeParam.push(array);
    }

    return listeParam;
}

function verifScroll (list) {
    list.forEach(element => {
        if (element.afficher == false) {
            var departAnim = element.position - ($(window).height() / 100 * element.height);

            if ($(window).scrollTop() >= departAnim) {
                element.afficher = true;

                animation(element);
            }
        }
    });
}

function animation (list) {
    if (list.animation == "") {
        if (list.delay == 0) {
            $(list.dom).fadeTo(list.duration * 1000, 1);
        }else {
            setTimeout(function() {
                $(list.dom).fadeTo(list.duration * 1000, 1);
            }, list.delay * 1000);
        }
    }else {
        var time = list.duration;
        var delay = list.delay;
        var animation = list.animation;
        var valeurCss = time + "s linear " + delay + "s 1 " + animation;

        var css = {
            "animation" : valeurCss,
            "-webkit-animation" : valeurCss,
            "-moz-animation" : valeurCss 
        };

        $(list.dom).attr("style", "").css(css);

        setTimeout(function () {
            $(list.dom).attr("style", "");
        }, delay * 1000 + time * 1000 + 900);
    }
}

function updateList (list) {
    list.forEach(element => {
        var position = $(element.dom).offset();

        element.position = position.top;
    });
}
jQuery(document).ready(function() {
    $("#siteInfo .conteneur").hover(function() {
        $("#siteInfo").attr("hover", "true");
    }, function() {
        $("#siteInfo").attr("hover", "false");
    });
});