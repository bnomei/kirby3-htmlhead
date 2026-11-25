<?php

use Kirby\Cms\Html;

echo Html::tag('link', '', [
    'rel' => 'alternate',
    'type' => 'application/rss+xml',
    'href' => url($url ?? '/feed'),
    'title' => $title ?? $page->title(),
]);
