<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('bnomei/htmlhead', [
    'options' => [
        'snippets' => [
            'htmlhead/recommended-minimum' => null,
            'htmlhead/title' => function ($kirby, $site, $page) {
                return ['title' => $page->title()];
            },
            'htmlhead/base' => function($kirby, $site, $page) {
                return ['href' => kirby()->site()->url()];
            },
            'htmlhead/meta-robots' => function ($kirby, $site, $page) {
                return ['content' => 'index, follow, noodp'];
            },
            /*
            'htmlhead/link-css' => function ($kirby, $site, $page) {
                return ['files' => []];
            },
            'htmlhead/link-js' => function ($kirby, $site, $page) {
                return ['files' => []];
            },
            */
        ],
    ],
    'snippets' => [
        'htmlhead/alternates' => __DIR__ . '/snippets/htmlhead/alternates.php',
        'htmlhead/base' => __DIR__ . '/snippets/htmlhead/base.php',
        'htmlhead/canonical' => __DIR__ . '/snippets/htmlhead/canonical.php',
        'htmlhead/google-analytics' => __DIR__ . '/snippets/htmlhead/google-analytics.php',
        'htmlhead/google-globalsitetag' => __DIR__ . '/snippets/htmlhead/google-globalsitetag.php',
        'htmlhead/google-tagmanager' => __DIR__ . '/snippets/htmlhead/google-tagmanager.php',
        'htmlhead/link-a11ycss' => __DIR__ . '/snippets/htmlhead/link-a11ycss.php',
        'htmlhead/link-css' => __DIR__ . '/snippets/htmlhead/link-css.php',
        'htmlhead/link-feedjson' => __DIR__ . '/snippets/htmlhead/link-feedjson.php',
        'htmlhead/link-feedrss' => __DIR__ . '/snippets/htmlhead/link-feedrss.php',
        'htmlhead/link-preload' => __DIR__ . '/snippets/htmlhead/link-preload.php',
        'htmlhead/link-prefetch' => __DIR__ . '/snippets/htmlhead/link-prefetch.php',
        'htmlhead/meta-author' => __DIR__ . '/snippets/htmlhead/meta-author.php',
        'htmlhead/meta-description' => __DIR__ . '/snippets/htmlhead/meta-description.php',
        'htmlhead/meta-robots' => __DIR__ . '/snippets/htmlhead/meta-robots.php',
        'htmlhead/recommended-minimum' => __DIR__ . '/snippets/htmlhead/recommended-minimum.php',
        'htmlhead/script-js' => __DIR__ . '/snippets/htmlhead/script-js.php',
        'htmlhead/script-webfontloader' => __DIR__ . '/snippets/htmlhead/script-webfontloader.php',
        'htmlhead/title' => __DIR__ . '/snippets/htmlhead/title.php',
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
