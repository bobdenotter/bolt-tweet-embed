<?php

namespace Bolt\Extension\Bobdenotter\Tweetembed;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{

    public function initialize()
    {
        // Twig functions
        $this->addTwigFunction('tweet', 'tweet');
        $this->addTwigFunction('tweetembed', 'tweet');
    }

    public function getName()
    {
        return "Tweetembed";
    }

    public function isSafe()
    {
        return true;
    }

    public function tweet($what)
    {
        $this->addSnippet('endofbody', '<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>');

        if (is_numeric($what)) {
            $what = 'https://twitter.com/x/status/' . $what;
        }

        if (strpos($what, 'http') !== 0) {
            $what = 'https://' . $what;
        }

        $res = sprintf(
                '<blockquote class="twitter-tweet" lang="en"> (loading tweet) <a href="%s">%s</a></blockquote>',
                $what,
                $what # in the butt.
            );

        return new \Twig_Markup($res, 'UTF-8');
    }

}






