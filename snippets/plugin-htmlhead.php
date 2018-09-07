<?php
    $metatags = isset($metatags) ? $metatags : [];
    echo \Bnomei\HTMLHead::alpha($page, $metatags);

    $options = isset($options) ? $options : [];
    echo \Bnomei\HTMLHead::snippets($page, $options);
