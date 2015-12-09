---
title:  An Open Source Strategy for ATS
description: ATS released our first open source project in early 2013. This paper outlines some of the reasoning behind our OSS contributions.
author: Nathan Evans
platform: Medium
original: https://medium.com/@natoverse/an-open-source-strategy-for-ats-c5cca250ef48
---

*The following is a position paper I put together for the ATS management team in late 2012. It was intended to introduce them to the idea of open source as something that we, as a for-profit company, could participate in.
We’ve come a long way in our embrace of the open source ethos, and some of the statements below feel out-dated (for example, we’re much more* lassiez-faire *about what we release than I expected). I love how this has taken off within the company, and it makes me happy that we’ve run with the best parts of what’s below, and ignored the bad parts.
In the interest of transparency, I’ve reproduced the paper nearly verbatim from the original, with only minor typo edits and removal of a couple of contract references.*

# Abstract

ATS has long been a consumer of open source software (OSS) for the technology and development services we provide. This has brought many benefits to our development process and the products we deliver for our customers — including faster development times and external contribution from domain experts. With the changing landscape of technology and software development, OSS is gaining a greater role both commercially and within the government. Our primary customer — the federal government — is embracing OSS as part of the United States CIO’s “shared platform” movement away from custom-built tools [[1]]. This shift in OSS perception and usage necessitates a more active role in OSS software development by ATS.

This paper is not intended to cover the usage policies of OSS by ATS as an entity; that should be evaluated per-project based on the needs of the customer and contract. It is worth noting, however, that ATS does not have a formal policy for open source library usage. Most of our projects use it extensively without significant review of license compatibility. Rather, it is written to establish a baseline and policy recommendation for why we should contribute to OSS, making parts of our codebase freely available.

# What is OSS?

The Open Source Initiative (OSI) maintains an official definition of OSS as part of its work as a standards body [[2]]. In general, open source means that source code for a software component is freely available and redistributable.
Open source software currently powers most of the web (the open source Apache web server serves 55% of the internet [[3]]), and the general public now uses open source regularly (for example, the open source browsers Chrome and Firefox are estimated to account for 40–60% of browsing activity [[4]]).

# Why should ATS write OSS?

## Our government clients want it

RFPs and government contracts are increasingly requesting extensive use of OSS in order to reduce costs. The USPTO PE2E project, for example, made the decision to move from Oracle to MySQL largely based on cost reduction — by adopting an open source product instead of a paid database. Releasing software components as open source allows ATS to explicitly demonstrate how a customer can benefit from reuse of code that has already been written — allowing us to deliver solutions at lower cost and with higher reliability. This has tremendous potential within large organizations with similar projects underway; a relevant example being the spread of our gadget-based approach to UI development from PE2E to TMNG, FPNG and others at USPTO. When customers see that they can get immediate value by reusing us as a contractor and eliminating duplicate code, we gain a decisive competitive advantage.

## Some contracts require it as output

Going beyond the requirement for OSS inclusion in government contract software development is a recent trend of actually requiring OSS output as a result of the contract. A recent example of this is National Gallery of Art’s ConservationSpace project, which is intended to be released as an open source toolkit for other galleries both government and academic [[5]].

## External contribution

Releasing software packages to the open source community invites external contribution from interested developers around the world. These contributions can directly enhance the core functionality of the product in question, at minimal cost to ATS.

## Giving back

ATS has benefitted tremendously from OSS through the years, from free licenses for major operating systems, to dozens of pre-written libraries that we have incorporated into our projects. The use of OSS throughout our projects at all levels has consistently reduced development cost, enabling us to deliver quality products at a competitive price. When ATS has developed libraries internally that may have benefit to others, releasing them publicly is simply a good thing to do — an acknowledgment that our success is bound to the productive labors of engineers with no financial stake in our company, and that we can contribute in kind to the success of others.

## Goodwill

Beyond the baser moral imperative to give back, this contribution affects business goodwill directly, with a potential increase to the fundamental accounting value of the company [[6]]. Company contribution to OSS projects elevates the brand and perception of ATS as an advocate for freedom, increasing goodwill in a highly competitive environment. The largest US software companies have significant contributions to OSS as part of their corporate philosophy, including Google, Facebook, Netflix, Apple, and Microsoft. See for example [[7]] [[8]]. In an age where IP protectionism and excessive software patents are increasingly seen as negatives, demonstrating open sharing of technology brings significant positive perception to the corporate image, which translates directly to overall value and favor with existing and potential clients.

## Professional development

Allowing ATS software engineers to manage and contribute to open source projects helps develop their professional reputation on the wider Internet. This benefits our engineers by building a strong resume and recognition among their peers worldwide, and increases job satisfaction when they are able to interact with others at a professional level outside of the company. Developer profile pages on the open source code-hosting site GitHub have been called “the new resume” — an indicator of how meaningful open source contribution is becoming within technology culture [[9]]. The ATS brand and reputation also benefit when our engineers are known as technology leaders in the greater software community.

## Recruiting

In addition to providing professional development for engineers who already work for ATS, supporting open source projects can also be an attractive feature for potential new employees. Any external engineers who contribute to our projects would be possible candidates for job openings, providing us with a direct link rather than relying on expensive recruiting websites and consultants. These engineers are likely to be highly desirable candidates — proven by their motivation to contribute to open source projects, as well as an established relationship with the ATS engineers who are managing the project.

## Revenue stream

Over the last several years, licensing as a revenue model for software has been declining both commercially and within the government sector. ATS has experienced customer reluctance to pay licensing and maintenance fees, with customers instead focusing on software development services based on technology platforms. Much of the licensing revenue decline is in fact a result of greater enterprise adoption of OSS solutions.

A number of large software companies have recognized the trend away from licensing and have built successful businesses based around support packages, training/certification, and application development services that sit on top of free, open source software stacks. Most notable among these are Red Hat (distributor of Red Hat Enterprise Linux and JBoss), IBM, Oracle (MySQL), and a number of smaller and boutique shops such as SpringSource (Spring Framework), DataStax (Apache Cassandra), Cloudera (Hadoop) and SitePen (Dojo Toolkit). ATS could potentially create revenue streams from its open source contributions.

An additional model used is the multi-edition approach, whereby the software is released in a free and open source state, but an “enterprise” version is also developed internally by the company — building upon the open source code but adding additional features, stability, and guarantees that don’t come with the free edition. MySQL is distributed in this manner, with a free “community” edition downloadable by anyone as well as several paid editions containing various levels of functionality that are differentiated in price [[10]].

## Encouraging reuse

Reusing internally developed software libraries within an organization is often difficult, due to a variety of repositories for code and artifacts, and the tendency to store all project-related code under a single source tree. Treating internally developed libraries as though they are completely independent third-party dependencies encourages sharing and reuse by extracting them from project repositories. Moving that extraction further — as an open source project — provides even greater encouragement and a natural infrastructure to enable this reuse by fundamentally altering how developers work with and incorporate these components.

# What about IP?

Protection of intellectual property is often one of the first complaints regarding an open source model — Microsoft’s Steve Ballmer famously called the open source Linux kernel a “cancer” to intellectual property [[11]]. While this viewpoint may have had its merits in years past, changes in OSS consumer adoption and business models built around OSS have proven that not only has the perception of strong IP protectionism skewed toward the negative, profits can be built on an open source foundation.

## The web is open

Source code is fundamentally difficult to protect. In compiled programming languages that run directly against an operating system (e.g., C/C++), the compiled artifact can hold IP secrets. However, with the advent of virtual machines as a ubiquitous programming paradigm, this protection of secrets is fundamentally compromised. This is particularly notable with JavaScript, which is the most common language we write software with as a company. JavaScript is delivered to web browsers as source; therefore any user or competitor with access to the deployed application can also retrieve all of the source code. With the reality of unprotected code making it easily into competitors’ hands, a logical response is to make it freely available and gain the aforementioned benefits of open sourcing — depending instead on our expertise and reputation as a competitive advantage.

## Patents protect core IP

Where ATS has spent significant R&D dollars developing new technologies, patent protection is still available for our IP. However, our customers are increasingly moving away from patented, proprietary software, so this may not continue to be a relevant business model. Our current customers are license-averse, preferring to pay us for our expertise rather than software fees.

## Government licenses are GOSS

Our existing government contracts have already moved to a “Government Open Source Software” (GOSS) model, meaning that the code we write is available for other federal agencies to use without cost. We are therefore already experiencing the open source model — developing software that our primary customer base can use anywhere for free. This model is successful for ATS because we provide excellent service and problem solving for our customer, retaining business on the merits of our work rather than forcing vendor lock-in.

## Services over OSS

As mentioned earlier, a large number of companies have already built successful business models providing services over OSS, and some of our existing contracts are essentially the same concept using GOSS. This model could be expanded to full OSS, potentially extending our reach from government to commercial sectors. An example opportunity is that presented by a recent RFP that requires an open source product to be released. If this project is successful, it could lead to significant additional business from other entities looking to implement or extend the system within their own enterprises.

## Not everything should be open sourced

Moving to an open source-friendly business model does not mean that all ATS source code or products should be open sourced. Individual projects should be reviewed to weigh the cost of open sourcing versus the benefit, as well as additional factors such as IP protection and strategic advantage. Additionally, much of the code we produce would have little use to the open source community, as it is custom integration code for a customer. Rather, the components we reuse consistently would be the candidates for wider distribution.

# Recommendations

Based upon the above statements of open source benefits to ATS, the following recommendations are provided:

* Embrace OSS
* Streamline approval for OSS projects
* Use a common, well-known license
* Use GitHub for hosting
* Manage branding and professionalism
* Manage external contributions
* Advertise our involvement

These recommendations are described in detail below.

## Embrace OSS

ATS should actively involve itself in contribution to open source projects, including the development and maintenance of entirely new components.

## Streamline approval for OSS projects

In order to encourage developer participation and ownership, barriers to contribution should be generally low. Senior technical staff can recommend to management the level of monitoring and approval a specific project needs based on its size and complexity.

Large projects (multi-week or greater efforts) should receive review from senior technical staff and corporate management to ensure consistency with ATS strategy and image. Resources will need to be available to showcase the project appropriately within our branding avenues.

Small projects (multi-day or smaller efforts) should receive review from senior technical staff to ensure core standards are met for quality and documentation. Smaller projects are more likely to get after-hours engineering time because developers gain a stronger sense of ownership; these projects should therefore be encouraged by making it easy for developers to start and maintain them.

## Use a common, well-known license

Hundreds of open source licenses exist, with less than a dozen covering most projects. It is important to ensure that the license we select is compatible with ATS’ business goals. The Open Source Initiative provides a catalog of approved open source licenses, and recommends that most projects select a well-known license to minimize confusion around the rights available [[12]]. This selection process needs to take into account:

* Copyright preservation
* Redistribution rights
* Reciprocal requirements

An additional consideration for the licensing model is that of multi-licensing, which is the practice of releasing open source code with specific limitations based on the end use [[13]]. For example, code may be allowable for use in any projects that are themselves open source, but must be paid for if used for commercial purposes. This could be an option if ATS has concerns about IP protection or competitive use of our codebase. MySQL source code, for example, is released under the GPL license, which requires derivative works to be open source. However, they offer commercial licenses to the source as well so that entities that intend to profit from the code must pay for it.

It is recommended that ATS management and senior technical staff discuss the licensing options available and select one or two licenses for review by our attorney.

## Use GitHub for hosting

Open source projects need to reside on a publicly accessible server so that users and contributors can download the code and related artifacts. GitHub [[14]] has emerged as a leading host for open source projects, and is recommended for the following reasons:

* Completely free for open source code
* Tools are in place to publish code and documentation easily
* Built-in issue tracking; collaborators can inform us of bugs easily with a ticket
* Widely used, increasing potential exposure

Several government agencies have now begun using GitHub to post open source code, including the White House [[15]] and NASA [[16]].

## Manage branding and professionalism

The ATS brand needs to be considered for all external postings. Developers must be professional in their interactions with external contributors and the general public, and the project hosting site content should reflect this professionalism.

Code quality is a reflection of ATS as an engineering contractor; as such the quality of code for projects released to the public should be the best we produce. Libraries should be rigorously tested with current best practices, and bugs should be addressed quickly.

Documentation should be clear, complete, and up-to-date, making it easy for a potential user to work with the component. This demonstrates to potential customers that we will be easy to work with and can properly support their O&M needs.

## Manage external contributions

ATS should take an active management approach to external contribution, meaning that contributors can submit patches that will be reviewed by ATS engineers and applied if appropriate. It is not recommended at this time that external contributors be assigned direct commit permissions.

## Advertise our involvement

Due to the goodwill generated by OSS involvement, our marketing and branding avenues should be used to broadcast this activity to potential partners and customers.

## Social media

Announcements to our social media feeds (Facebook, Twitter) should be made when significant activity occurs on an open source project we support.

## Marketing materials

Marketing materials such as data sheets and brochures should mention our involvement in open source as a goodwill generator. As noted previously, this can be used to increase positive perception of our brand.

## Proposal templates

Our proposal templates should be edited to include boilerplate about our involvement in open source for the same reasons as our marketing materials. For contracts that require OSS usage, this involvement should be emphasized directly.

## Tech blog

Many technology companies maintain an engineering blog as a way of showcasing their talent and the technology they have developed [[17]] [[18]] [[19]] etc. It is recommended that ATS consider a similar outlet, where engineers can be encouraged to periodically write about open source projects we are supporting.

## OSI trademarks

The Open Source Initiative includes trademarks and logos that can be used to adorn corporate materials [[20]]. The OSI licensing terms should be reviewed to determine if our OSS contributions are conformant, making those trademarks available to ATS.

[1]: http://www.whitehouse.gov/sites/default/files/omb/egov/digital-government/digital-government.html
[2]: http://opensource.org/docs/osd
[3]: http://en.wikipedia.org/wiki/Apache_HTTP_Server
[4]: http://en.wikipedia.org/wiki/Usage_share_of_web_browsers
[5]: http://conservationspace.org/
[6]: http://en.wikipedia.org/wiki/Goodwill_%28accounting%29
[7]: http://netflix.github.com/
[8]: https://developer.apple.com/opensource/
[9]: https://github.com/features/community
[10]: http://www.mysql.com/products/
[11]: http://www.theregister.co.uk/2001/06/02/ballmer_linux_is_a_cancer/
[12]: http://opensource.org/licenses/category
[13]: http://en.wikipedia.org/wiki/Multi-licensing
[14]: https://github.com/
[15]: https://github.com/whitehouse
[16]: https://github.com/nasa
[17]: https://www.facebook.com/Engineering
[18]: http://developer.yahoo.com/blogs/ydn/
[19]: http://techblog.netflix.com/
[20]: http://opensource.org/trademark-guidelines