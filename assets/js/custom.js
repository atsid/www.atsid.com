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

function initJobs() {
    var cont = document.getElementById('jobs');
    if (cont) {
        var url = "https://235g4vs0dj.execute-api.us-west-2.amazonaws.com/prod/hrm-direct-jobs";
        var request = new Http.Get(url, true);
        request.start().then(function (response) {
            cont.innerHTML = "";

            var jobs = response;

            jobs.sort(function (a, b) {
                if (a.state > b.state) {
                    return 1;
                }
                if (a.state < b.state) {
                    return -1;
                }
                if (a.city > b.city) {
                    return 1;
                }
                if (a.city < b.city) {
                    return -1;
                }
                if (a.title > b.title) {
                    return 1;
                }
                if (a.title < b.title) {
                    return -1;
                }
                return 0;
            });

            var html = "";
            var job;
            var tpl;

            console.log(jobs);

            for (var i = 0; i < jobs.length; i++) {
                job = jobs[i];
                tpl = '<div class="jobs__item">' +
                '<div class="jobs__item__location">' + job.city + ', ' + job.state + '</div>' +
                '<div class="jobs__item__position"><a href="' + job.href + '" target="_blank">' + job.title + '</a></div>' +
                '</div>'
                cont.innerHTML += tpl;
            }
        });
    }}



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
    initJobs();
    initMenu();
}

window.onload = init();
