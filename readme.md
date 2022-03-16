# Kirby 3 HTMLHead

![Release](https://flat.badgen.net/packagist/v/bnomei/kirby3-htmlhead?color=ae81ff)
![Downloads](https://flat.badgen.net/packagist/dt/bnomei/kirby3-htmlhead?color=272822)
[![Build Status](https://flat.badgen.net/travis/bnomei/kirby3-htmlhead)](https://travis-ci.com/bnomei/kirby3-htmlhead)
[![Coverage Status](https://flat.badgen.net/coveralls/c/github/bnomei/kirby3-htmlhead)](https://coveralls.io/github/bnomei/kirby3-htmlhead) 
[![Maintainability](https://flat.badgen.net/codeclimate/maintainability/bnomei/kirby3-htmlhead)](https://codeclimate.com/github/bnomei/kirby3-htmlhead) 
[![Twitter](https://flat.badgen.net/badge/twitter/bnomei?color=66d9ef)](https://twitter.com/bnomei)


Kirby 3 Plugin for a best-practice HTML Head Element extendable with snippets.

## Commercial Usage

> <br>
><b>Support open source!</b><br><br>
> This plugin is free but if you use it in a commercial project please consider to sponsor me or make a donation.<br>
> If my work helped you to make some cash it seems fair to me that I might get a little reward as well, right?<br><br>
> Be kind. Share a little. Thanks.<br><br>
> &dash; Bruno<br>
> &nbsp; 

| M | O | N | E | Y |
|---|----|---|---|---|
| [Github sponsor](https://github.com/sponsors/bnomei) | [Patreon](https://patreon.com/bnomei) | [Buy Me a Coffee](https://buymeacoff.ee/bnomei) | [Paypal dontation](https://www.paypal.me/bnomei/15) | [Hire me](mailto:b@bnomei.com?subject=Kirby) |

## Installation

- unzip [master.zip](https://github.com/bnomei/kirby3-htmlhead/archive/master.zip) as folder `site/plugins/kirby3-htmlhead` or
- `git submodule add https://github.com/bnomei/kirby3-htmlhead.git site/plugins/kirby3-htmlhead` or
- `composer require bnomei/kirby3-htmlhead`

## Works well with

- [fabianmichael/kirby-meta](https://github.com/fabianmichael/kirby-meta) to add OpenGraph, Twitter and JSON-ld
- and some of my [other Plugins](https://github.com/bnomei/kirby3-htmlhead/blob/master/composer.json#L76)

## Usage

### Site Method: attrLang

There is a language helper available as well.

```php
<?php ?>
<html <?= site()->langAttr() ?>>
<!-- ... -->
</html>
```

### Page Method: htmlhead

In any template or your `header` snippet call the page method right after the tags that should come first.

```diff
   <!DOCTYPE html>
-  <html>
+  <html <?= site()->langAttr() ?>>
     <head>
-      <meta charset="utf-8">
-      <meta http-equiv="x-ua-compatible" content="ie=edge">
-      <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
-      <base href="<?= site()->url() ?>'">'
-      <title><?= $page->title() ?></title>
+      <?= $page->htmlhead() ?>
```

You can also override any defaults in forwarding the **new or additional** data to the page method.
```php
<?= $page->htmlhead([
    // override defaults
    'htmlhead/meta-description' => function ($kirby, $site, $page) {
        return Str::unhtml($page->myDescriptionField()->kti());
    },
    // add new
    'htmlhead/link-feedrss' => function ($kirby, $site, $page) {
        return []; // use defaults of snippet
    },
]) ?>
```

But I would recommend that you configure which snippets are use with the config settings (see below).

## Setting

There is only one setting called `bnomei.htmlhead.snippets` and it takes an array of callbacks. It has [sensible defaults](https://github.com/bnomei/kirby3-htmlhead/blob/master/index.php) but you can add any of [the provided snippets](https://github.com/bnomei/kirby3-htmlhead/blob/master/snippets/htmlhead) or your own snippets. The unittests for this plugin have a [more specific example](https://github.com/bnomei/kirby3-htmlhead/blob/master/tests/config/config.php) for you to explore.

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
        /* 
          // https://github.com/fabianmichael/kirby-meta
         'htmlhead/meta' => function ($kirby, $site, $page) {
            return [];
         },
         */
        'htmlhead/link-preload' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css', '/endpoint/data.json']];
        },
        'htmlhead/link-prefetch' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/next-page.js']];
        },
        'htmlhead/link-css' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css']];
        },
        'htmlhead/script-js' => function ($kirby, $site, $page) {
            return ['files' => [
                [
                    'src' => '//unpkg.com/alpinejs', 
                    'defer' => true,
                ],
                '/assets/app.js',
                'https://cdn.jsdelivr.net/npm/webfontloader@1.6.28/webfontloader.min.js|sha256-4O4pS1SH31ZqrSO2A/2QJTVjTPqVe+jnYgOWUVr7EEc=',
            ]];
        },
        'htmlhead/script-webfontloader' => function ($kirby, $site, $page) {
            return [
                'nonce' => null, // $page->nonceAttr('my-webfontloader-nonce') from https://github.com/bnomei/kirby3-security-headers#setter
                'json' => [
                    'google' => [
                        'families' => ['Montserrat']
                    ],
                ],
            ];
        },
        'htmlhead/link-feedrss' => function ($kirby, $site, $page) {
            // defaults
            return [
                'url' => url('/feed'),
                'title' => $page->title(),
            ];
        },
    ],
    // ... other options
];
```

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/bnomei/kirby3-htmlhead/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
