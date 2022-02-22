<?php

$urls = $urls ?? [];
foreach ($urls as $url) {
    if (strlen(trim($url)) === 0) {
        continue;
    }
    $options['rel'] = 'preconnect';
    $options['href'] = $url;

    echo Html::tag('link', null, $options) . PHP_EOL;
}
