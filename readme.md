# Kirby HTMLHead

![Release](https://flat.badgen.net/packagist/v/bnomei/kirby3-htmlhead?color=ae81ff)
![Downloads](https://flat.badgen.net/packagist/dt/bnomei/kirby3-htmlhead?color=272822)
[![Build Status](https://flat.badgen.net/travis/bnomei/kirby3-htmlhead)](https://travis-ci.com/bnomei/kirby3-htmlhead)
[![Coverage Status](https://flat.badgen.net/coveralls/c/github/bnomei/kirby3-htmlhead)](https://coveralls.io/github/bnomei/kirby3-htmlhead) 
[![Maintainability](https://flat.badgen.net/codeclimate/maintainability/bnomei/kirby3-htmlhead)](https://codeclimate.com/github/bnomei/kirby3-htmlhead) 
[![Twitter](https://flat.badgen.net/badge/twitter/bnomei?color=66d9ef)](https://twitter.com/bnomei)


Kirby Plugin for a best-practice HTML Head Element extendable with snippets.

## Installation

- unzip [master.zip](https://github.com/bnomei/kirby3-htmlhead/archive/master.zip) as folder `site/plugins/kirby3-htmlhead` or
- `git submodule add https://github.com/bnomei/kirby3-htmlhead.git site/plugins/kirby3-htmlhead` or
- `composer require bnomei/kirby3-htmlhead`

## Works well with

- [fabianmichael/kirby-meta](https://github.com/fabianmichael/kirby-meta) to add OpenGraph and JSON-ld
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
         * IMPORTANT: order matters! based on research from @csswizardry
         */
        'htmlhead/recommended-minimum' => null,
        'htmlhead/title' => function ($kirby, $site, $page) {
            return ['title' => $page->title()];
        },
        // async first then sync js scripts
        'htmlhead/script-js' => function ($kirby, $site, $page) {
            return ['files' => [
                '/assets/app.js'            
            ]];
        },
        'htmlhead/link-css' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css']];
        },
        'htmlhead/link-preload' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/app.css', '/endpoint/data.json']];
        },
        // deferred scripts after sync css is faster
        'htmlhead/script-js-defer' => function ($kirby, $site, $page) {
            return ['files' => [
                [
                    'src' => '//unpkg.com/alpinejs', 
                    'defer' => true,
                ],        
            ]];
        },
        'htmlhead/link-prefetch' => function ($kirby, $site, $page) {
            return ['files' => ['/assets/next-page.js']];
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
        'htmlhead/link-feedrss' => function ($kirby, $site, $page) {
            // defaults
            return [
                'url' => url('/feed'),
                'title' => $page->title(),
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
