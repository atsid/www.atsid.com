---
title: Creating Jekyll blog posts right from GitHub
description: The non-programmer's guide to creating a Jekyll blog post using only the GitHub web interface.
author: Nathan Evans
platform: Medium
preview: true
category: blog
layout: post
---

Like many organizations, we’ve moved to a CMS-free website stored in [GitHub](https://github.com/atsid/www.atsid.com), using [Jekyll](http://jekyllrb.com) to generate the content. Our website has a blog, which Jekyll has specific support for. However, not everyone in the organization is going to be fluent in the technologies needed to publish blog posts (git, Markdown, YAML), so this is a tutorial showing how to do it right from the GitHub website. All you need is a GitHub account with write access to your website’s repository.

A couple of notes before we jump in:

1. These instructions were created in December 2015, and the screenshots represent GitHub’s interface at the time. They do periodically refresh the layout, but the principles and operations should remain the same.
1. The sample content I’ve provided is what we use for our blog configuration at ATS. Not all Jekyll-hosted blogs will be identical, but again the samples should provide a useful starting point. The “optional” sections are ATS-specific.

Alright, let’s get started!

# TL;DR
Here’s a short summary of the steps below without all the explanatory text and screenshots. After you’ve read the detailed instructions, consider this a refresher for future use. Or if it really is too long and you didn’t read it…

1. Navigate to the **_posts** folder.
1. Create a new file for your post. Name it like **YYYY-MM-DD-short-name.md**.
1. Add the YAML front matter at the top of the post file. **title**, **description**, **author**, **layout**, and **category** are required. Use the optional platform, original, and preview fields as needed to link to external content.
1. Add your post content using **Markdown** syntax, either in full or as a compelling preview.
1. **Commit** the file, creating a **branch** and **pull request** in the process.
1. **Merge** the branch after you’ve gotten some feedback from your peers.
