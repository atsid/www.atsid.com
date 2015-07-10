---
layout: default
title: Contact
permalink: /contact/
byline: Reach out to us today!
---

<article class="hero hero--contact">
    <div class="hero__content hero__content--short">
        <h2 class="hero__title">How can we help you?</h2>
        <p class="hero__summary">Whether you'd like to know more about what we do, need help with your project, or would like to partner with us - <strong>we'd love to hear from you!</strong>.</p>    
    </div>
</article>

<section class="contact-container">
    <article class="contact-locations">
        <h3>OUR HAPPY PLACE</h3>
        <h2>Locations</h2>
        {% for cat in site.locations %}
            <div class="location-list">
            {% for loc in cat[1] %}
                <div class="location-list__item">
                    <div class="location-list__item__photo">
                        <img src=""/>
                        <div class="location-list__item__photo__hover">
                            <div class="directions-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="28" viewBox="0 0 8 14">
                                    <path d="M6 5q0-0.828-0.586-1.414t-1.414-0.586-1.414 0.586-0.586 1.414 0.586 1.414 1.414 0.586 1.414-0.586 0.586-1.414zM8 5q0 0.852-0.258 1.398l-2.844 6.047q-0.125 0.258-0.371 0.406t-0.527 0.148-0.527-0.148-0.363-0.406l-2.852-6.047q-0.258-0.547-0.258-1.398 0-1.656 1.172-2.828t2.828-1.172 2.828 1.172 1.172 2.828z" fill="#fff"></path>
                                    </svg>
                            </div>
                            <div>Get Directions</div>
                        </div>
                    </div>
                    <h4>{{loc.name}}</h4>
                    <dl>
                        <dt>ADDRESS</dt>
                        <dd>
                            <div>{{loc.addressLine1}}</div>
                            <div>{{loc.addressLine2}}</div>
                        </dd>
                        <dt>PHONE</dt>
                        <dd>{{loc.phone}}</dd>
                        <dt>FAX</dt>
                        <dd>{{loc.fax}}</dd>
                        <dt>EMAIL</dt>
                        <dd><a href="mailto:{{loc.email}}">{{loc.email}}</a></dd>
                    </dl>
                </div>
            {% endfor %}
            </div>
        {% endfor %}
    </article>
</section>