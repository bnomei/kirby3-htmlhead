<?php

echo \Kirby\Cms\Html::tag('link', '', [
    'rel' => 'alternate',
    'type' => 'application/rss+xml',
    'href' => url($url ?? '/feed'),
    'title' => $title ?? $page->title(),
]);
