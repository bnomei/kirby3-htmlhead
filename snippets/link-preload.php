<?php

$files = $files ?? [];
foreach ($files as $dep) {
    if (! $dep || strlen(trim($dep)) === 0) {
        continue;
    }
    $options['rel'] = 'preload';
    $options['href'] = $dep;
    if (strpos($dep, '|') !== false) {
        [$href, $as, $origin] = explode('|', $dep);
        $options['href'] = $href;
        $options['as'] = $as;
        if ($origin) {
            $options['crossorigin'] = is_string($origin) ? $origin : true;
        }

    } else {
        // https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types/preload
        if (Str::contains($dep, '.js')) {
            $options['as'] = 'script';
        } elseif (Str::contains($dep, '.css')) {
            $options['as'] = 'style';
        } elseif (Str::contains($dep, '.json')) {
            $options['as'] = 'fetch';
            $options['crossorigin'] = true;
        } elseif (Str::contains($dep, '.woff')) {
            $options['as'] = 'font';
            $options['crossorigin'] = true;
        } elseif (Str::contains($dep, '.svg') || Str::contains($dep, '.png') || Str::contains($dep, '.jpg') || Str::contains($dep, '.gif') || Str::contains($dep, '.avif') || Str::contains($dep, '.webp')) {
            $options['as'] = 'image';
        }
    }
    if (class_exists('\Bnomei\Fingerprint') && in_array($options['as'], ['script', 'style'])) {
        $options['href'] = \Bnomei\Fingerprint::url($options['href']);
    }

    echo \Kirby\Cms\Html::tag('link', null, $options).PHP_EOL;
}
