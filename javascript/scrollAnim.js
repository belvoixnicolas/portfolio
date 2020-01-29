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

    for (index = 0; index < classScroll.length; index++) {
        var dom = classScroll[index];
        var position = $(dom).offset();
        var animation = "";
        var animationAttr = $(dom).attr("scroll_anim_css");
        var duration = "1";
        var durationAttr = $(dom).attr("scroll_anim_duration");
        var delay = "0";
        var delayAttr = $(dom).attr("scroll_anim_delay");
        var height = 50;
        var heightAttr = $(dom).attr("scroll_anim_height");

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