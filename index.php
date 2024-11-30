<?php

use Kirby\Cms\Page;

@include_once __DIR__.'/vendor/autoload.php';

if (! class_exists('Bnomei\HTMLHead')) {
    require_once __DIR__.'/classes/HTMLHead.php';
}

if (! function_exists('htmlhead')) {
    function htmlhead(?Page $page = null): \Bnomei\HTMLHead
    {
        return \Bnomei\HTMLHead::singleton($page ?? kirby()->site()->page());
    }
}

Kirby::plugin('bnomei/htmlhead', [
    'options' => [
        'snippets' => [], // needs to be set in config or via fluent helper
    ],
    'snippets' => [
        'base' => __DIR__.'/snippets/base.php',
        'fathom' => __DIR__.'/snippets/fathom.php',
        'google-analytics' => __DIR__.'/snippets/google-analytics.php',
        'google-globalsitetag' => __DIR__.'/snippets/google-globalsitetag.php',
        'google-tagmanager' => __DIR__.'/snippets/google-tagmanager.php',
        'link-a11ycss' => __DIR__.'/snippets/link-a11ycss.php',
        'link-alternates' => __DIR__.'/snippets/link-alternates.php',
        'link-canonical' => __DIR__.'/snippets/link-canonical.php',
        'link-css' => __DIR__.'/snippets/link-css.php',
        'link-csswizardry-ct' => __DIR__.'/snippets/link-csswizardry-ct.php',
        'link-feedjson' => __DIR__.'/snippets/link-feedjson.php',
        'link-feedrss' => __DIR__.'/snippets/link-feedrss.php',
        'link-preconnect' => __DIR__.'/snippets/link-preconnect.php',
        'link-prefetch' => __DIR__.'/snippets/link-prefetch.php',
        'link-preload' => __DIR__.'/snippets/link-preload.php',
        'matomo' => __DIR__.'/snippets/matomo.php',
        'meta' => __DIR__.'/snippets/meta.php',
        'meta-author' => __DIR__.'/snippets/meta-author.php',
        'meta-opengraph' => __DIR__.'/snippets/meta-opengraph.php',
        'meta-twittercards' => __DIR__.'/snippets/meta-twittercards.php',
        'meta-description' => __DIR__.'/snippets/meta-description.php',
        'meta-robots' => __DIR__.'/snippets/meta-robots.php',
        'recommended-minimum' => __DIR__.'/snippets/recommended-minimum.php',
        'script-js' => __DIR__.'/snippets/script-js.php',
        'script-js-async' => __DIR__.'/snippets/script-js-async.php',
        'script-js-defer' => __DIR__.'/snippets/script-js-defer.php',
        'script-instantpage' => __DIR__.'/snippets/script-instantpage.php',
        'title' => __DIR__.'/snippets/title.php',
        'umami' => __DIR__.'/snippets/umami.php',
    ],
    'pageMethods' => [
        'htmlhead' => function (): string {
            return \Bnomei\HTMLHead::singleton($this);
        },
    ],
]);
