<?php

Kirby::plugin('bnomei/htmlhead', [
  'options' => [
    'indent' => '    ',
    // 'a11ycss.debugOnly' => option('debug', false),
    'a11ycss' => 'https://rawgit.com/ffoodd/a11y.css/master/css/a11y-en.css',
    'feed' => false,
    'googleanalytics' => 'UA-',
    'googleanalytics.anonymizeIp' => true,
    'googlewebfonts' => [],
    'typekit' => false,
    'snippets' => [],
    // 'opengraph' => [...] // defaults in snippet
    // 'seo' => [...] // defaults in snippet
  ],
  'snippets' => [
    'plugin-htmlhead' => __DIR__ . '/snippets/plugin-htmlhead.php',
    'htmlhead/a11ycss' => __DIR__ . '/snippets/htmlhead/a11ycss.php',
    'htmlhead/feed' => __DIR__ . '/snippets/htmlhead/feed.php',
    'htmlhead/googleanalytics' => __DIR__ . '/snippets/htmlhead/googleanalytics.php',
    'htmlhead/googlewebfonts' => __DIR__ . '/snippets/htmlhead/googlewebfonts.php',
    'htmlhead/opengraph' => __DIR__ . '/snippets/htmlhead/opengraph.php',
    'htmlhead/seo' => __DIR__ . '/snippets/htmlhead/seo.php',
    'htmlhead/typekit' => __DIR__ . '/snippets/htmlhead/typekit.php',
  ],
  'pageMethods' => [
    'htmlhead_snippets' => function($page) {
        return \Bnomei\HTMLHead::snippets($page);
    },
    'htmlhead_alpha' => function($page, $title = null) {
        return \Bnomei\HTMLHead::alpha($page, $title);
    }
  ]
]);
