<?php

$files = $files ?? [];
foreach ($files as $dep) {
    $options['rel'] = 'preload';
    $options['href'] = $dep;
    if (strpos($dep, '|') !== false) {
        list($href, $as) = explode('|', $dep);
        $options['href'] = $href;
        $options['as'] = $as;
    } else {
        // https://developer.mozilla.org/en-US/docs/Web/HTML/Preloading_content
        if(Str::endsWith($dep, '.js')) {
            $options['as'] = 'script';
        } elseif(Str::endsWith($dep, '.css')) {
            $options['as'] = 'style';
        } elseif(Str::endsWith($dep, '.json')) {
            $options['as'] = 'fetch';
        }
    }
    echo Html::tag('link', null, $options);
}
