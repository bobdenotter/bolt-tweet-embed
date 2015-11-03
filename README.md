Bolt Tweetembed
======================

A simple extension to embed tweets from Twitter in your website. 

To use, simply copy the 'link to tweet', and put it in a `{{ tweet() }}` tag:

```
{{ tweet('https://twitter.com/BoltCM/status/651792096198795264') }}
```

Or if you're feeling particularly lazy, use: 

```
{{ tweet(651792096198795264) }}
```

Note: If you'd like to use this directly from the content editor, Make sure you've enabled `allowtwig: true` in your `contenttypes.yml`. For example: 

```
entries:
    name: Entries
    singular_name: Entry
    fields:
        [..]
        teaser:
            type: html
            height: 150px
            allowtwig: true
```            



