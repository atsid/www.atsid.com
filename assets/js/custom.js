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
                if (a.department > b.department) {
                    return -1;
                }
                if (a.department < b.department) {
                    return 1;
                }
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
            var departments = {};
            var job;
            var tpl;

            console.log(jobs);

            for (var i = 0; i < jobs.length; i++) {
                job = jobs[i];
                if (!departments[job.department]) {
                    departments[job.department] = {
                        department: job.department,
                        html: '<div class="jobs__department" id="' + job.department.replace(' ', '') + '"><div class="jobs__list">'
                    };
                }
                tpl = '<div class="jobs__item">' +
                '<div class="jobs__item__location">' + job.city + ', ' + job.state + '</div>' +
                '<div class="jobs__item__position"><a href="' + job.href + '" target="_blank">' + job.title + '</a></div>' +
                '</div>'
                departments[job.department].html += tpl;
            }
            var tabs = '<div class="jobs__tabs">';
            
            for (var prop in departments) {
                tabs += '<div class="jobs__tabs__tab" data-tab="' + departments[prop].department.replace(' ', '') + '">' + departments[prop].department + '</div>'
                html += (departments[prop].html + "</div></div>");
            }
            tabs += "</div>"
            tabs += html;

            cont.innerHTML = tabs;

            var tabEls = cont.querySelectorAll('.jobs__tabs__tab');
            var tabContainers = cont.querySelectorAll('.jobs__deparment');
            var selectedTabEl, selectedContainerEl;

            function setupTab(tabEl, targetEl) {
                tabEl.addEventListener('click', function (e) {
                    if (tabEl != selectedTabEl) {
                        classie.add(tabEl, 'active');
                        classie.remove(selectedTabEl, 'active');
                        classie.add(targetEl, 'active');
                        classie.remove(selectedContainerEl, 'active');
                        selectedContainerEl = targetEl;
                        selectedTabEl = tabEl;
                    }
                });
            }

            for (i = 0; i < tabEls.length; i++) {
                var tabEl = tabEls[i];
                var targetEl = document.getElementById(tabEl.getAttribute('data-tab'));
                // make first tab active
                if (i == 0) {
                    classie.add(tabEl, 'active');
                    classie.add(targetEl, 'active');
                    selectedTabEl = tabEl;
                    selectedContainerEl = targetEl;
                }
                setupTab(tabEl, targetEl);
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