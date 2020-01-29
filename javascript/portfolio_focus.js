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
                        $("#siteInfo #linkSite").attr("href", data.url);

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
            $("#siteInfo #linkSite").attr("style", "").attr("href", "").attr("data", "");
        } ,600);
    });
});