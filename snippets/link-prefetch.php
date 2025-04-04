<?php

$files = $files ?? [];
foreach ($files as $dep) {
    if (! $dep || strlen(trim($dep)) === 0) {
        continue;
    }
    $options['rel'] = 'prefetch';
    $options['href'] = $dep;
    if (strpos($dep, '|') !== false) {
        [$href, $as] = explode('|', $dep);
        $options['href'] = $href;
        $options['as'] = $as;
    } else {
        // https://developer.mozilla.org/en-US/docs/Web/HTML/Preloading_content
        if (Str::contains($dep, '.js')) {
            $options['as'] = 'script';
        } elseif (Str::contains($dep, '.css')) {
            $options['as'] = 'style';
        } elseif (Str::contains($dep, '.json')) {
            $options['as'] = 'fetch';
        }
    }
    if (class_exists('\Bnomei\Fingerprint')) {
        $options['href'] = \Bnomei\Fingerprint::url($options['href']);
    }
    echo \Kirby\Cms\Html::tag('link', null, $options).PHP_EOL;
}
