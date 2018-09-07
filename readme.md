# Kirby 3 HTMLHead

![GitHub release](https://img.shields.io/github/release/bnomei/kirby3-htmlhead.svg?maxAge=1800) ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-3%2B-black.svg)

Kirby 3 Plugin for a best-practice HTML Head Element extendable with snippets.

This plugin is free but if you use it in a commercial project please consider to [make a donation 🍻](https://www.paypal.me/bnomei/5).

## Key Features

- basic metatags
- rss feed
- opengraph
- [webfontloader](https://github.com/typekit/webfontloader) to load and track webfonts
- [loadjs](https://github.com/muicss/loadjs) to load js and css
- [a11y.css](http://ffoodd.github.io/a11y.css/) when config `debug => true`
- Unregistered Snippet examples for google-analytics and google-tag-manager. You need to copy them to your `/site/snippets` folder.

## Usage

In any template or your `header` snippet call the page method right after the tags that should come first.

```php
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<base href="<?= site()->url() ?>'">'
<link rel="canonical" href="<?= $page->url() ?>">'
<title><?= $page->title() ?></title>
<?= $page->htmlhead_snippets() ?>
```

Or if you would use these meta tags anyway you can use

```php
<?= $page->htmlhead_alpha($page->title()) ?>
<?= $page->htmlhead_snippets() ?>
// or just
<?php snippet('plugin-htmlhead') ?>
```

You can also provide custom metatags and on-the-fly options.

```php
<?php
    $metatags = [
        '<meta name="robots" content="noindex, nofollow">',
        '<meta name="keywords" content="Kirby,Plugin,Html,Head,Meta,Snippets">',
    ];
    $options = [
        'htmlhead/seo' => false,
        'htmlhead/opengraph' => false,
    ]
?>
<?= $page->htmlhead_alpha($page->title(), $metatags) ?>
<?= $page->htmlhead_snippets($options) ?>
// or just
<?php snippet('plugin-htmlhead', [
    'metatags' => $metatags, 
    'options' => $options
]) ?>
```

## Extending with Snippets

If you have your own snippets you want to have called at the header simply add them to the `bnomei.htmlhead.snippets` setting. For example you could create a `snippet/matomo.php` with your piwik/matomo tracking code and just add that to the config.

```php
return [
    'bnomei.htmlhead.snippets' => [
        'matomo'
    ],
    // ... other options
];
```

## Setting

You can set these in your `site/config/config.php` or in your template code since `$page` has to exist.

### bnomei.htmlhead.snippets
- default: []
- this will call all snippets of this plugin. add the name of your snippet without its file-extension.

### bnomei.htmlhead.seo (template only)
- default: see snippet, `false` to disable

- you can use a [Kirby Page Model](https://getkirby.com/docs/developer-guide/advanced/models) or [Kirby Page Methods](https://getkirby.com/docs/developer-guide/objects/page) to provide the values `head_author` and `head_description` easily.

### bnomei.htmlhead.opengraph (template only)
- default: see snippet, `false` to disable

### bnomei.htmlhead.feed
- default: false
- URI for `application/rss+xml` feed page object.

### bnomei.htmlhead.a11ycss.debugOnly
- default: option('debug', false)
- a11y.css will only be loaded if debug is enabled.

### bnomei.htmlhead.a11ycss
- default: 'https://rawgit.com/ffoodd/a11y.css/master/css/a11y-en.css'
- set this any other a11y.css configuration or to `false` if you want to disable a11y.css.

### bnomei.htmlhead.loadjs
- default: []
- array of values with template name for filtering
- assets will be [fingerprinted if plugin is installed](https://github.com/bnomei/kirby3-fingerprint)
- inline scripts will be protected by [nonce](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src#Unsafe_inline_script) if [security headers plugin is installed](https://github.com/bnomei/kirby3-security-headers)

> TIP: if loading assets from other servers consider using fingerprint plugin with SRI instead.

```php
return [
    'bnomei.htmlhead.loadjs' => [
        'home' => [ // custom id
            'template' => ['home', 'projects'], // templates
            'dependencies' => [
                '/assets/js/zepto.min.js',
                '/assets/js/flickty.pkg.min.js',
                '/assets/css/flickty.min.css', // css too!
                '/assets/js/complex-stuff.js'
            ]
        ],
        '*' => [ // fallback
            'template' => [], // all templates
            'dependencies' => [
                '/assets/js/zepto.min.js',
                '/assets/js/simple.js'
            ]
        ],
    ],
    // ... other options
];
```

### bnomei.htmlhead.webfontloader
- default: false
- set a string to be echoed [example](https://github.com/typekit/webfontloader#custom)
```php
return [
    'bnomei.htmlhead.webfontloader' => 
        "google: {
            families: ['Droid Sans']
        },
        custom: {
            families: ['My Font', 'My Other Font:n4,i4,n7'],
            urls: ['/fonts.css']
        }",
    // ... other options
];
```

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/bnomei/kirby3-htmlhead/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
