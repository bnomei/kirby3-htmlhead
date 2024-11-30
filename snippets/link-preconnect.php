<?php

$urls = $urls ?? [];
foreach ($urls as $url) {
    if (! $url || strlen(trim($url)) === 0) {
        continue;
    }
    $options['rel'] = 'preconnect';
    $options['href'] = $url;

    echo \Kirby\Cms\Html::tag('link', null, $options).PHP_EOL;
}
