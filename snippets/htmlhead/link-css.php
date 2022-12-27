<?php

$files = $files ?? [];
foreach ($files as $dep) {
    $options = [];
    if (is_array($dep)) {
        $options = $dep;
        $dep = A::get($options, 'href');
        if (array_key_exists('href', $options)) {
            unset($options['href']);
        }
    }
    if (empty($dep)) {
        continue;
    }
    if (strpos($dep, '|') !== false) {
        list($dep, $integrity) = explode('|', $dep);
        $options = array_merge([
            'integrity' => $integrity,
            'crossorigin' => 'anonymous',
        ], $options);
    }
    if (class_exists('\Bnomei\Fingerprint')) {
        echo Bnomei\Fingerprint::css($dep, $options) . PHP_EOL;
    } else {
        echo css($dep, $options);
    }
}
