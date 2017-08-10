---
---
{% include_relative classie.js %}
{% include_relative jsonp.js %}

function checkAndUpdateHeader(e) {
    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        showOn = 100,
        header = document.querySelector("header");
    if (distanceY > showOn) {
        classie.add(header, "page_nav--showing");
    } else {
        if (classie.has(header, "page_nav--showing")) {
            classie.remove(header, "page_nav--showing");
        }
    }
}

function initMenu() {
    var opened = false;

    var btn = document.getElementById("nav-toggle-menu");
    var nav = document.getElementsByTagName("nav")[0];

    btn.addEventListener("click", function () {
        if (!opened) {
            classie.add(nav, 'nav--active');
        } else {
            classie.remove(nav, 'nav--active');
        }
        opened = !opened;
    });
}

function init() {
    window.addEventListener('scroll', checkAndUpdateHeader);
    window.addEventListener('resize', checkAndUpdateHeader);
    checkAndUpdateHeader();
    initMenu();
}

window.onload = init();
