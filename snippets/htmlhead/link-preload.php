<?php

$files = $files ?? [];
foreach ($files as $dep) {
    if (!$dep || strlen(trim($dep)) === 0) {
        continue;
    }
    $options['rel'] = 'preload';
    $options['href'] = $dep;
    if (strpos($dep, '|') !== false) {
        list($href, $as) = explode('|', $dep);
        $options['href'] = $href;
        $options['as'] = $as;
    } else {
        // https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types/preload
        if (Str::contains($dep, '.js')) {
            $options['as'] = 'script';
        } elseif (Str::contains($dep, '.css')) {
            $options['as'] = 'style';
        } elseif (Str::contains($dep, '.json')) {
            $options['as'] = 'fetch';
        } elseif (Str::contains($dep, '.woff')) {
            $options['as'] = 'font';
        } elseif (Str::contains($dep, '.svg') || Str::contains($dep, '.png') || Str::contains($dep, '.jpg') || Str::contains($dep, '.gif')  || Str::contains($dep, '.avif')  || Str::contains($dep, '.webp')) {
            $options['as'] = 'image';
        }
    }
    if (class_exists('\Bnomei\Fingerprint')) {
        $options['href'] = Bnomei\Fingerprint::url($options['href']);
    }
    echo Html::tag('link', null, $options) . PHP_EOL;
}
