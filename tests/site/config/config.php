<?php

return [
    'bnomei.htmlhead.snippets' => [
        /********************************
         * IMPORTANT: order matters!
         */
        'htmlhead/recommended-minimum' => null,
        'htmlhead/title' => function ($kirby, $site, $page) {
            return ['title' => $page->title()];
        },
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
        'htmlhead/link-css' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css']];
        },
        'htmlhead/script-js' => function ($kirby, $site, $page) {
            return ['files' => [
                '/assets/app.js',
                'https://cdn.jsdelivr.net/npm/webfontloader@1.6.28/webfontloader.min.js|sha256-4O4pS1SH31ZqrSO2A/2QJTVjTPqVe+jnYgOWUVr7EEc='
            ]];
        },
        'htmlhead/script-webfontloader' => function ($kirby, $site, $page) {
            return [
                'nonce' => null, // $page->nonce('my-webfontloader-nonce') from https://github.com/bnomei/kirby3-security-headers#setter
                'json' => [
                    'google' => [
                        'families' => ['Montserrat']
                    ],
                ],
            ];
        },
        'htmlhead/link-a11ycss' => function ($kirby, $site, $page) {
            return ['url' => 'https://github.com/ffoodd/a11y.css/blob/master/css/a11y-en_errors-only.css'];
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
