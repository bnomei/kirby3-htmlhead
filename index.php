<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('bnomei/htmlhead', [
    'options' => [
        'snippets' => [],
    ],
    'snippets' => [
        'htmlhead/base' => __DIR__ . '/snippets/htmlhead/base.php',
        'htmlhead/fathom' => __DIR__ . '/snippets/htmlhead/fathom.php',
        'htmlhead/google-analytics' => __DIR__ . '/snippets/htmlhead/google-analytics.php',
        'htmlhead/google-globalsitetag' => __DIR__ . '/snippets/htmlhead/google-globalsitetag.php',
        'htmlhead/google-tagmanager' => __DIR__ . '/snippets/htmlhead/google-tagmanager.php',
        'htmlhead/link-a11ycss' => __DIR__ . '/snippets/htmlhead/link-a11ycss.php',
        'htmlhead/link-alternates' => __DIR__ . '/snippets/htmlhead/link-alternates.php',
        'htmlhead/link-canonical' => __DIR__ . '/snippets/htmlhead/link-canonical.php',
        'htmlhead/link-css' => __DIR__ . '/snippets/htmlhead/link-css.php',
        'htmlhead/link-csswizardry-ct' => __DIR__ . '/snippets/htmlhead/link-csswizardry-ct.php',
        'htmlhead/link-feedjson' => __DIR__ . '/snippets/htmlhead/link-feedjson.php',
        'htmlhead/link-feedrss' => __DIR__ . '/snippets/htmlhead/link-feedrss.php',
        'htmlhead/link-preconnect' => __DIR__ . '/snippets/htmlhead/link-preconnect.php',
        'htmlhead/link-prefetch' => __DIR__ . '/snippets/htmlhead/link-prefetch.php',
        'htmlhead/link-preload' => __DIR__ . '/snippets/htmlhead/link-preload.php',
        'htmlhead/matomo' => __DIR__ . '/snippets/htmlhead/matomo.php',
        'htmlhead/meta' => __DIR__ . '/snippets/htmlhead/meta.php',
        'htmlhead/meta-author' => __DIR__ . '/snippets/htmlhead/meta-author.php',
        'htmlhead/meta-opengraph' => __DIR__ . '/snippets/htmlhead/meta-opengraph.php',
        'htmlhead/meta-twittercards' => __DIR__ . '/snippets/htmlhead/meta-twittercards.php',
        'htmlhead/meta-description' => __DIR__ . '/snippets/htmlhead/meta-description.php',
        'htmlhead/meta-robots' => __DIR__ . '/snippets/htmlhead/meta-robots.php',
        'htmlhead/recommended-minimum' => __DIR__ . '/snippets/htmlhead/recommended-minimum.php',
        'htmlhead/script-js' => __DIR__ . '/snippets/htmlhead/script-js.php',
        'htmlhead/script-js-async' => __DIR__ . '/snippets/htmlhead/script-js-async.php',
        'htmlhead/script-js-defer' => __DIR__ . '/snippets/htmlhead/script-js-defer.php',
        'htmlhead/script-instantpage' => __DIR__ . '/snippets/htmlhead/script-instantpage.php',
        'htmlhead/title' => __DIR__ . '/snippets/htmlhead/title.php',
        'htmlhead/umami' => __DIR__ . '/snippets/htmlhead/umami.php',
    ],
    'pageMethods' => [
        'htmlhead' => function ($snippets = []) {
            return \Bnomei\HTMLHead::snippets($this, $snippets);
        },
    ],
    'siteMethods' => [
        'attrLang' => function () {
            if (is_null(kirby()->language())) {
                return '';
            }
            return 'lang="' . kirby()->language()->code() . '"';
        },
        'langAttr' => function () {
            if (is_null(kirby()->language())) {
                return '';
            }
            return 'lang="' . kirby()->language()->code() . '"';
        }
    ]
]);
