function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            showOn = 100,
            header = document.querySelector("header");
        if (distanceY > showOn) {
            classie.add(header,"page_nav--showing");
        } else {
            if (classie.has(header,"page_nav--showing")) {
                classie.remove(header,"page_nav--showing");
            }
        }
    });
}
window.onload = init();
