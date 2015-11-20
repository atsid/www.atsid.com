---
layout: default
title: Blog
permalink: /blog/
exclude_from_nav: true
---
<article class="hero hero--blog">
    <div class="hero__content hero__content--short">
        <h2 class="hero__title">What is ATS doing today?</h2>
        <p class="hero__summary">We love to learn, and we love to share. See what our staff and leadership have been up to lately.</p>
    </div>
</article>

<section class="blog">
    {% for post in site.posts %}
    <article>
        <h2><a class="blog-title" href="{{ post.url | prepend: site.baseurl }}">{{ post.title }}</a></h2>
        <span class="post-meta">{{ post.date | date: "%b %-d, %Y" }}</span>
        <p>{{ post.description }}</p>
        <a href="{{ post.url | prepend: site.baseurl }}" class="button button--outline">Read More</a>
    </article>
{% endfor %}
</section>