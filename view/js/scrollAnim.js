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
    let classScroll = $(".scrollanim");
    let listeParam = [];

    for (let index = 0; index < classScroll.length; index++) {
        let dom = classScroll[index];
        let position = $(dom).offset();
        let animation = "";
        let animationAttr = $(dom).attr("scroll_anim_css");
        let duration = "1";
        let durationAttr = $(dom).attr("scroll_anim_duration");
        let delay = "0"
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
            let departAnim = element.position - ($(window).height() / 100 * element.height);

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
        let time = list.duration;
        let delay = list.delay;
        let animation = list.animation;

        $(list.dom).attr("style", "").css("animation", time + "s linear " + delay + "s 1 " + animation);

        setTimeout(function () {
            $(list.dom).attr("style", "");
        }, delay * 1000 + time * 1000 + 900);
    }
}

function updateList (list) {
    list.forEach(element => {
        let position = $(element.dom).offset();

        element.position = position.top;
    });
}