# Kirby 3 HTMLHead

![Release](https://flat.badgen.net/packagist/v/bnomei/kirby3-htmlhead?color=ae81ff)
![Stars](https://flat.badgen.net/packagist/ghs/bnomei/kirby3-htmlhead?color=272822)
![Downloads](https://flat.badgen.net/packagist/dt/bnomei/kirby3-htmlhead?color=272822)
![Issues](https://flat.badgen.net/packagist/ghi/bnomei/kirby3-htmlhead?color=e6db74)
[![Build Status](https://flat.badgen.net/travis/bnomei/kirby3-htmlhead)](https://travis-ci.com/bnomei/kirby3-htmlhead)
[![Coverage Status](https://flat.badgen.net/coveralls/c/github/bnomei/kirby3-htmlhead)](https://coveralls.io/github/bnomei/kirby3-htmlhead) 
[![Maintainability](https://flat.badgen.net/codeclimate/maintainability/bnomei/kirby3-htmlhead)](https://codeclimate.com/github/bnomei/kirby3-htmlhead) 
[![Demo](https://flat.badgen.net/badge/website/examples?color=f92672)](https://kirby3-plugins.bnomei.com/htmlhead) 
[![Gitter](https://flat.badgen.net/badge/gitter/chat?color=982ab3)](https://gitter.im/bnomei-kirby-3-plugins/community) 
[![Twitter](https://flat.badgen.net/badge/twitter/bnomei?color=66d9ef)](https://twitter.com/bnomei)


Kirby 3 Plugin for a best-practice HTML Head Element extendable with snippets.

## Commercial Usage

This plugin is free but if you use it in a commercial project please consider to 
- [make a donation 🍻](https://www.paypal.me/bnomei/5) or
- [buy me ☕](https://buymeacoff.ee/bnomei) or
- [buy a Kirby license using this affiliate link](https://a.paddle.com/v2/click/1129/35731?link=1170)

## Installation

- unzip [master.zip](https://github.com/bnomei/kirby3-htmlhead/archive/master.zip) as folder `site/plugins/kirby3-htmlhead` or
- `git submodule add https://github.com/bnomei/kirby3-htmlhead.git site/plugins/kirby3-htmlhead` or
- `composer require bnomei/kirby3-htmlhead`

## Works well with

- [pedroborges/kirby-meta-tags](https://github.com/pedroborges/kirby-meta-tags) to add OpenGraph, Twitter and JSON-ld
- and some of my [other Plugins](https://github.com/bnomei/kirby3-htmlhead/blob/master/composer.json#L76)

## Usage

### Page Method: htmlhead

In any template or your `header` snippet call the page method right after the tags that should come first.

```diff
-  <html>
+  <html <?= site()->attrLang() ?>>
   <body>
-      <meta charset="utf-8">
-      <meta http-equiv="x-ua-compatible" content="ie=edge">
-      <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
-      <base href="<?= site()->url() ?>'">'
-      <link rel="canonical" href="<?= $page->url() ?>">'
-      <title><?= $page->title() ?></title>
+      <?= $page->htmlhead() ?>
+      <?= $page->metatags() ?>
```

### Site Method: attrLang

There is a language helper available as well.

```php
<html <?= site()->attrLang() ?>>
<!-- ... ->
</html>
```

## Setting

There is only one setting called `bnomei.htmlheadsnippets` and it takes an array of callbacks. It has [sensible defaults](https://github.com/bnomei/kirby3-htmlhead/blob/master/index.php) but you can add any of [the provided snippets](https://github.com/bnomei/kirby3-htmlhead/blob/master/snippets) or your own snippets. The unittests for this plugin have a [more specific example](https://github.com/bnomei/kirby3-htmlhead/blob/master/tests/config/config.php) for you to explore.

**https://github.com/bnomei/kirby3-htmlhead/blob/master/tests/config/config.php**
```php
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
            return ['json' =>
                [
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
```

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/bnomei/kirby3-htmlhead/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
