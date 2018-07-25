# Kirby HTML Head

![GitHub release](https://img.shields.io/github/release/bnomei/kirby3-htmlhead.svg?maxAge=1800) ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-3%2B-red.svg)

Kirby Plugin for a best-practice HTML Head Element extendable with snippets.

This plugin is free but if you use it in a commercial project please consider to [make a donation 🍻](https://www.paypal.me/bnomei/5).

## Key Features

- basic metatags
- rss feed
- opengraph
- google analytics with anonymize IP
- google webfonts
- typekit
- [a11y.css](http://ffoodd.github.io/a11y.css/) when config `debug => true`

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
<?= snippet('plugin-htmlhead') ?>
```

If you have your own snippets you want to have called at the header simply add them to the `bnomei.htmlhead.snippets` setting.

## Setting

You can set these in your `site/config/config.php` or in your template code since `$page` has to exist.

### bnomei.htmlhead.snippets
- default: []
- this will call all snippets of this plugin. add the name of your snippet without its file-extension.

### bnomei.htmlhead.seo (template only)
- default: see snippet

- you can use a [Kirby Page Model](https://getkirby.com/docs/developer-guide/advanced/models) or [Kirby Page Methods](https://getkirby.com/docs/developer-guide/objects/page) to provide the values `head_author` and `head_description` easily.

### bnomei.htmlhead.opengraph (template only)
- default: see snippet

### bnomei.htmlhead.feed
- default: false
- URI for `application/rss+xml` feed page object.

### bnomei.htmlhead.typekit
- default: false
- set your typkit id to load your fonts async.

### bnomei.htmlhead.googlewebfonts
- default: []
- array of google font family names. like `Lato:400,700`.

### bnomei.htmlhead.googleanalytics
- default: 'UA-'
- your google analytics id.

### bnomei.htmlhead.googleanalytics.anonymizeIp
- default: `true`
- will set `anonymizeIp` if enabled.

### bnomei.htmlhead.a11ycss.debugOnly
- default: option('debug', false)
- a11y.css will only be loaded if debug is enabled.

### bnomei.htmlhead.a11ycss
- default: 'https://rawgit.com/ffoodd/a11y.css/master/css/a11y-en.css'
- set this any other a11y.css configuration or to `false` if you want to disable a11y.css.

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/bnomei/kirby3-htmlhead/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
