<?php

return [
    'debug' => true,

    'bnomei.htmlhead.snippetsXXX' => [
        /********************************
         * IMPORTANT: order matters! based on research from @csswizardry
         */
        'htmlhead/recommended-minimum' => null,
        'htmlhead/title' => function ($kirby, $site, $page) {
            return ['title' => $page->title()];
        },
        'htmlhead/link-preconnect' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css', '/endpoint/data.json']];
        },
        'htmlhead/script-js' => function ($kirby, $site, $page) {
            return ['files' => [
                '/assets/app.js',
            ]];
        },
        'htmlhead/link-css' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css']];
        },
        'htmlhead/link-a11ycss' => function ($kirby, $site, $page) {
            return ['url' => 'https://github.com/ffoodd/a11y.css/blob/master/css/a11y-en_errors-only.css'];
        },
        'htmlhead/link-csswizardry-ct' => null,
        'htmlhead/link-preload' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css', '/endpoint/data.json']];
        },
        'htmlhead/link-prefetch' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/next-page.js']];
        },
        /*
        'htmlhead/meta' => function ($kirby, $site, $page) {
            return [];
        },
        */
        'htmlhead/base' => function ($kirby, $site, $page) {
            return ['href' => kirby()->site()->url()];
        },
        'htmlhead/meta-robots' => function ($kirby, $site, $page) {
            return ['content' => 'index, follow, noodp'];
        },
        'htmlhead/meta-author' => function ($kirby, $site, $page) {
            return ['content' => $site->author()];
        },
        'htmlhead/meta-description' => function ($kirby, $site, $page) {
            return ['content' => Str::unhtml($page->seodesc())];
        },
        'htmlhead/link-feedrss' => function ($kirby, $site, $page) {
            // defaults
            return [
                'url' => url('/feed'),
                'title' => $page->title(),
            ];
        },
    ],
];
