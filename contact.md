---
layout: default
title: Contact
permalink: /contact/
byline: Reach out to us today!
nav_order: 50
---

<article class="hero hero--contact">
    <div class="hero__content hero__content--short">
        <h2 class="hero__title">How can we help you?</h2>
        <p class="hero__summary">Whether you'd like to know more about what we do, need help with your project, or would like to partner with us &mdash; <strong>we'd love to hear from you!</strong></p>    
    </div>
</article>

<section class="contact-container">
    <article class="contact-information">
        <div>
            <h3>Work with us</h3>
            <p>Want to stand out from the rest? We’d love to work with you, so feel free to send us an email. We’ll get back to you shortly.
            <div class="mail-link">
                <div class="mail-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="15" viewBox="0 0 14 14">
                        <path d="M14 5.547v6.203q0 0.516-0.367 0.883t-0.883 0.367h-11.5q-0.516 0-0.883-0.367t-0.367-0.883v-6.203q0.344 0.383 0.789 0.68 2.828 1.922 3.883 2.695 0.445 0.328 0.723 0.512t0.738 0.375 0.859 0.191h0.016q0.398 0 0.859-0.191t0.738-0.375 0.723-0.512q1.328-0.961 3.891-2.695 0.445-0.305 0.781-0.68zM14 3.25q0 0.617-0.383 1.18t-0.953 0.961q-2.937 2.039-3.656 2.539-0.078 0.055-0.332 0.238t-0.422 0.297-0.406 0.254-0.449 0.211-0.391 0.070h-0.016q-0.18 0-0.391-0.070t-0.449-0.211-0.406-0.254-0.422-0.297-0.332-0.238q-0.711-0.5-2.047-1.426t-1.602-1.113q-0.484-0.328-0.914-0.902t-0.43-1.066q0-0.609 0.324-1.016t0.926-0.406h11.5q0.508 0 0.879 0.367t0.371 0.883z" fill="#0045AC"></path>
                    </svg>
                </div>
                <a href="mailto:hello@atsid.com">hello@atsid.com</a>
            </div>
            </p>
        </div>
        <div>
            <h3>Interested in our products?</h3>
            <p>You can get in touch with our sales team by calling any of our offices as well as through email: 
            <div class="mail-link">
                <div class="mail-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="15" viewBox="0 0 14 14">
                        <path d="M14 5.547v6.203q0 0.516-0.367 0.883t-0.883 0.367h-11.5q-0.516 0-0.883-0.367t-0.367-0.883v-6.203q0.344 0.383 0.789 0.68 2.828 1.922 3.883 2.695 0.445 0.328 0.723 0.512t0.738 0.375 0.859 0.191h0.016q0.398 0 0.859-0.191t0.738-0.375 0.723-0.512q1.328-0.961 3.891-2.695 0.445-0.305 0.781-0.68zM14 3.25q0 0.617-0.383 1.18t-0.953 0.961q-2.937 2.039-3.656 2.539-0.078 0.055-0.332 0.238t-0.422 0.297-0.406 0.254-0.449 0.211-0.391 0.070h-0.016q-0.18 0-0.391-0.070t-0.449-0.211-0.406-0.254-0.422-0.297-0.332-0.238q-0.711-0.5-2.047-1.426t-1.602-1.113q-0.484-0.328-0.914-0.902t-0.43-1.066q0-0.609 0.324-1.016t0.926-0.406h11.5q0.508 0 0.879 0.367t0.371 0.883z" fill="#0045AC"></path>
                    </svg>
                </div>
                <a href="mailto:sales@atsid.com">sales@atsid.com</a>
            </div>
            </p>
        </div>
    </article>
    <article id="locations" class="contact-locations">
        <h3>WHERE WE WORK</h3>
        <h2>Locations</h2>
        {% for cat in site.locations %}
            <div class="location-list">
            {% for loc in cat[1] %}
                <div class="location-list__item">
                    <a class="location-list__item__photo" target="_blank" href="{{loc.link}}">
                        <img src="{{loc.photo}}"/>
                        <div class="location-list__item__photo__hover">
                            <div class="directions-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="28" viewBox="0 0 8 14">
                                    <path d="M6 5q0-0.828-0.586-1.414t-1.414-0.586-1.414 0.586-0.586 1.414 0.586 1.414 1.414 0.586 1.414-0.586 0.586-1.414zM8 5q0 0.852-0.258 1.398l-2.844 6.047q-0.125 0.258-0.371 0.406t-0.527 0.148-0.527-0.148-0.363-0.406l-2.852-6.047q-0.258-0.547-0.258-1.398 0-1.656 1.172-2.828t2.828-1.172 2.828 1.172 1.172 2.828z" fill="#fff"></path>
                                    </svg>
                            </div>
                            <div>Get Directions</div>
                        </div>
                    </a>
                    <h4>{{loc.name}}</h4>
                    <dl>
                        <dt>ADDRESS</dt>
                        <dd>
                            <div>{{loc.addressLine1}}</div>
                            <div>{{loc.addressLine2}}</div>
                        </dd>
                        <dt>PHONE</dt>
                        <dd><a href="tel:{{loc.phone}}">{{loc.phone}}</a></dd>
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
