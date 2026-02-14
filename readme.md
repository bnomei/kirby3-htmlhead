# Kirby HTMLHead

[![Kirby 5](https://flat.badgen.net/badge/Kirby/5?color=ECC748)](https://getkirby.com)
![PHP 8.2](https://flat.badgen.net/badge/PHP/8.2?color=4E5B93&icon=php&label)
![Release](https://flat.badgen.net/packagist/v/bnomei/kirby3-htmlhead?color=ae81ff&icon=github&label)
![Downloads](https://flat.badgen.net/packagist/dt/bnomei/kirby3-htmlhead?color=272822&icon=github&label)
[![Discord](https://flat.badgen.net/badge/discord/bnomei?color=7289da&icon=discord&label)](https://discordapp.com/users/bnomei)
[![Buymecoffee](https://flat.badgen.net/badge/icon/donate?icon=buymeacoffee&color=FF813F&label)](https://www.buymeacoffee.com/bnomei)

Kirby Plugin for a best-practice HTML Head Element extendable with snippets.

## Installation

- unzip [master.zip](https://github.com/bnomei/kirby3-htmlhead/archive/master.zip) as folder
  `site/plugins/kirby3-htmlhead` or
- `git submodule add https://github.com/bnomei/kirby3-htmlhead.git site/plugins/kirby3-htmlhead` or
- `composer require bnomei/kirby3-htmlhead`

## Usage

Use the `htmlhead()` helper to add meta tags, link tags, script tags, etc. to the head of your HTML document. The helper performs a little bit of magic and is actually calling regular Kirby snippets. This way, you can mix and match the helper with your own snippets.

> [!TIP]
> The order of the tags in the code example is based on best practices. You might want to stick to it as closely as possible and append your own at the end.

```php
<!DOCTYPE html>
<html>
    <head>
        <?= htmlhead()
            ->recommended_minimum()
            ->title()
            ->base()
            // ->link_preconnect(...)
            ->script_js_async(['/assets/app-async.js'])
            ->script_js(['/assets/app.js'])
            ->link_css(['/assets/app.css'])
            // ->link_a11ycss()
            // ->link_csswizardry_ct()
            // ->link_preload(...)
            // ->script_js_defer(['/assets/app-defer.js'])
            // ->link_prefetch(...)
            // ->link_prerender(...)
            // ->link_canonical(...)
            // ->link_alternates(...)
            ->meta_robots()
            ->meta_author(site()->author())
            ->meta_description($page->seoDesc())
            ->meta_opengraph(description: $page->seoDesc())
            ->link_feedrss()
            // site/snippets/my-snippet.php
            ->my_snippet(['key' => 'value'])
        ?>
    </head>
    <body>
        <!-- ... -->
    </body>
</html>
```

## Resources

- https://htmlhead.dev
- https://csswizardry.com/ct/
- https://x.com/csswizardry/status/1440710328266858500
- https://speakerdeck.com/csswizardry/get-your-head-straight?slide=39

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it
in a production environment. If you find any issues,
please [create a new issue](https://github.com/bnomei/kirby3-htmlhead/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or
any other form of hate speech.
