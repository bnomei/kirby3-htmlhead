<?php

echo HTML::tag('link', '', [
    'rel' =>  'alternate',
    'type' => 'application/json',
    'href' =>  url($url ?? '/feed'),
    'title' => $title ?? $page->title(),
]);
