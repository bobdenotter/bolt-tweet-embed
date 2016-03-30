<?php

namespace Bolt\Extension\Bobdenotter\TweetEmbed;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Extension\SimpleExtension;

class TweetEmbedExtension extends SimpleExtension
{
    protected function registerTwigFunctions()
    {
        return [
            'tweet' => 'tweet',
            'tweetembed' => 'tweet',
        ];
    }

    public function isSafe()
    {
        return true;
    }

    public function tweet($what)
    {
        $app = $this->getContainer();

        $asset = new Snippet();
        $asset->setCallback('<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>')
            ->setLocation(Target::END_OF_BODY);
        $app['asset.queue.snippet']->add($asset);

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

