[![Build Status](https://travis-ci.org/atsid/www.atsid.com.svg?branch=master)](https://travis-ci.org/atsid/www.atsid.com)
# http://www.atsid.com

```
git clone https://github.com/atsid/www.atsid.com.git
```

Start Jekyll server/watcher
```
bundle install
bundle exec rake serve
```

View live site at `http://localhost:4000/www.atsid.com/`

## Authoring Blog Posts

If you'd like to author a post for the blog:

1. Create a branch to work from.
1. Add a new file in the `_posts` folder named with the date and partial title.
1. Fill in the appropriate metadata in the yaml header (you can use an existing post as a template)
1. Submit a pull request to have the post reviewed by your teammates.

You have two publication options for blog posts:

1. You can create the post entirely within the post markdown file and submit it as is.
1. You can publish the post on your own external blog platform and then create a full or summary post here that links to the external content. If you only copy part of the content as an introduction, add a `preview: true` flag to the YAML header. We encourage posting full content because it reduces clicking and navigation for the user, but also understand if you want to keep the bulk of the content linked to your personal site.
 
It's really up to you how you want it posted, we just wanted to leave the option of linking to personal blogs so the content stays a part of your personal online content. As for subject matter, please limit the posts to content that is relevant to ATS and appropriate for a public site with our name on it. Posts on technology, design, culture, learning, strategy, etc. are all encouraged!
