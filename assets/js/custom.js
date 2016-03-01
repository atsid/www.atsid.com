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

function mapFields(jobs){
    // mapping from import.io fields to human readable fields
    var fields = {
        Department: 'reqrowclick_value_1',
        State: 'reqrowclick_value_3',
        City: 'reqrowclick_value_2',
        Position: {
            text: 'reqrowclick_link/_text',
            href: 'reqrowclick_link'
        }
    };

    var formattedJobs = jobs.slice(0);

    formattedJobs.forEach(function(job){
        job.Department = job[fields.Department];
        job.State = job[fields.State];
        job.City = job[fields.City];
        job.Position = {
            text: job[fields.Position.text],
            href: job[fields.Position.href]
        };
    });

    return formattedJobs;
}

function initJobs() {
    var cont = document.getElementById('jobs');
    if (cont) {
        var url = "https://api.import.io/store/connector/_magic?_apikey=31b1810b9a5a40fc8baec04885b84ccd06d16354a8c722b6d29903d85ed090f8192934726007204b3d72cc88c00a5a2898cef0b3da8a5fe6a041fd41ae036b2b3dcfbfa5443906e6990b8cbe27d104fa&url=http://atsid.hrmdirect.com/employment/job-openings.php?search=true";
        var request = new Http.Get(url, true);
        request.start().then(function (response) {
            cont.innerHTML = "";

            var responseJson = JSON.parse(response);
            var table = responseJson.tables[0];
            if (table.results && table.results.length) {
                var jobs = mapFields(table.results);
                jobs.sort(function (a, b) {
                    if (a.Department > b.Department) {
                        return -1;
                    }
                    if (a.Department < b.Department) {
                        return 1;
                    }
                    if (a.State > b.State) {
                        return 1;
                    }
                    if (a.State < b.State) {
                        return -1;
                    }
                    if (a.City > b.City) {
                        return 1;
                    }
                    if (a.City < b.City) {
                        return -1;
                    }
                    if (a.Position.text > b.Position.text) {
                        return 1;
                    }
                    if (a.Position.text < b.Position.text) {
                        return -1;
                    }
                    return 0;
                });

                var html = "";
                var departments = {};
                var job;
                var tpl;


                for (var i = 0; i < jobs.length; i++) {
                    job = jobs[i];
                    if (!departments[job.Department]) {
                        departments[job.Department] = {
                            department: job.Department,
                            html: '<div class="jobs__department" id="' + job.Department.replace(' ', '') + '"><div class="jobs__list">'
                        };
                    }
                    tpl = '<div class="jobs__item">' +
                    '<div class="jobs__item__location">' + job.City + ', ' + job.State + '</div>' +
                    '<div class="jobs__item__position"><a href="' + job.Position.href + '" target="_blank">' + job.Position.text + '</a></div>' +
                    '</div>'
                    departments[job.Department].html += tpl;
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