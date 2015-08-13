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

// fetch jobs from kiminolabs api if the page is the jobs page
function initJobs() {
    var cont = document.getElementById('jobs');
    if (cont) {
        window.jsonp("https://www.kimonolabs.com/api/4ud3yvpu?apikey=oKUBrbrOQm581EwTE55JxONqwZAuSDqu", function(err, response) {
            cont.innerHTML = "";

            var jobs = response.results["jobs"];
            jobs.sort(function(a, b) {
                if (a.Department > b.Department) { return -1; }
                if (a.Department < b.Department) { return 1; }
                if (a.State > b.State) { return 1; }
                if (a.State < b.State) { return -1; }
                if (a.City > b.City) { return 1; }
                if (a.City < b.City) { return -1; }
                if (a.Position.text > b.Position.text) { return 1; }
                if (a.Position.text < b.Position.text) { return -1; }
                return 0;
            });

            var html = "";
            var departments = {};
            var job;
            var tpl;
            for (var i = 0; i < jobs.length; i++) {
                job = jobs[i];
                if (!departments[job.Department]) {
                    departments[job.Department] = { department: job.Department, html: '<div class="jobs__department" id="'+job.Department.replace(' ', '')+'"><div class="jobs__list">' };
                }
                tpl = '<div class="jobs__item">' +
                          '<div class="jobs__item__location">' + job.City + ', ' + job.State + '</div>' +
                          '<div class="jobs__item__position"><a href="' + job.Position.href + '" target="_blank">' + job.Position.text + '</a></div>' +
                      '</div>'
                departments[job.Department].html += tpl;
            }
            var tabs = '<div class="jobs__tabs">';
            for (var prop in departments) {
                tabs += '<div class="jobs__tabs__tab" data-tab="'+ departments[prop].department.replace(' ', '') +'">'+departments[prop].department+'</div>'
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
    initJobs();
    initMenu();
}

window.onload = init();