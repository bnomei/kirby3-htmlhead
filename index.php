<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('bnomei/htmlhead', [
    'options' => [
      'indent' => '    ',
      // 'a11ycss.debugOnly' => option('debug', false),
      'a11ycss' => 'https://rawgit.com/ffoodd/a11y.css/master/css/a11y-en.css',
      'feed' => false,
      'webfontloader' => false,
      'css' => [],
      'js' => [],
      'loadjs' => [],
      'snippets' => [],
      // 'opengraph' => [...] // defaults in snippet
      // 'seo' => [...] // defaults in snippet
    ],
    'snippets' => [
      'plugin-htmlhead' => __DIR__ . '/snippets/plugin-htmlhead.php',
      'htmlhead/a11ycss' => __DIR__ . '/snippets/htmlhead/a11ycss.php',
      'htmlhead/css' => __DIR__ . '/snippets/htmlhead/css.php',
      'htmlhead/js' => __DIR__ . '/snippets/htmlhead/js.php',
      'htmlhead/feed' => __DIR__ . '/snippets/htmlhead/feed.php',
      'htmlhead/opengraph' => __DIR__ . '/snippets/htmlhead/opengraph.php',
      'htmlhead/seo' => __DIR__ . '/snippets/htmlhead/seo.php',
      'htmlhead/loadjs' => __DIR__ . '/snippets/htmlhead/loadjs.php',
      'htmlhead/webfontloader' => __DIR__ . '/snippets/htmlhead/webfontloader.php',
    ],
    'pageMethods' => [
      'htmlhead_snippets' => function () {
          return \Bnomei\HTMLHead::snippets($this);
      },
      'htmlhead_alpha' => function ($title = null) {
          return \Bnomei\HTMLHead::alpha($this, $title);
      }
    ],
    'siteMethods' => [
        'attrLang' => function () {
            if(option('languages')) {
                return 'lang="'.kirby()->language().'"';
            }
            return 'lang="'.option('bnomei.htmlhead.lang', 'en').'"';
        }
    ]
  ]);
  