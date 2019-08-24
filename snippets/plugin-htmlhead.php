<?php

use Bnomei\HTMLHead;

$metatags = isset($metatags) ? $metatags : [];
    echo HTMLHead::alpha($page, $metatags);

    $options = isset($options) ? $options : [];
    echo HTMLHead::snippets($page, $options);
