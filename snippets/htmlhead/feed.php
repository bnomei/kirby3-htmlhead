<?php
    $htmlhead_feed = option('bnomei.htmlhead.feed');
    if ($htmlhead_feed && is_string($htmlhead_feed) && \Kirby\Toolkit\Str::length(trim($htmlhead_feed)) > 0) {
        if ($htmlhead_feedpage = page($htmlhead_feed)) {
            echo \Kirby\Toolkit\HTML::tag('link', '', [
                'rel' =>  'alternate',
                'type' => 'application/rss+xml',
                'href' =>  $htmlhead_feedpage->url(),
                'title' => $htmlhead_feedpage->title(),
            ]).PHP_EOL;
        } else {
            echo \Kirby\Toolkit\HTML::tag('link', '', [
                'rel' =>  'alternate',
                'type' => 'application/rss+xml',
                'href' =>  url($htmlhead_feed),
                'title' => $htmlhead_feed,
            ]).PHP_EOL;
        }
    }
