<?php

namespace Bnomei;

class HTMLHead
{
    public static $snippets = [];
    public static function snippets($page, $options = [])
    {
        $return = [];

        if (count(self::$snippets) == 0) {
            foreach (\Kirby\Toolkit\Dir::read(
            implode(DIRECTORY_SEPARATOR, [
                __DIR__, '..', 'snippets', 'htmlhead'
            ])
        ) as $s) {
                self::$snippets[] = 'htmlhead/' . \Kirby\Toolkit\F::name($s);
            }
        }

        $indent = option('bnomei.htmlhead.indent');
        $customSnippets = option('bnomei.htmlhead.snippets');
        if (!is_array($customSnippets)) {
            $customSnippets = [];
        }
        self::$snippets = array_merge(self::$snippets, $customSnippets);
        sort(self::$snippets);

        foreach (self::$snippets as $snippetname) {
            if (!\Kirby\Toolkit\A::get($options, $snippetname, true)) {
                continue;
            }

            $snip = snippet($snippetname, ['page' => $page, 'indent' => $indent], true);
            if (\Kirby\Toolkit\Str::length(trim($snip)) == 0) {
                continue;
            }

            $snip = explode(PHP_EOL, $snip);
            $sarr = array_map(function ($line) use ($indent) {
                return $indent.trim($line).PHP_EOL;
            }, $snip);

            $return[] = $indent.'<!-- '.\Kirby\Toolkit\Str::upper(str_replace('htmlhead/', '', $snippetname)).' -->'.PHP_EOL;
            $return = array_merge($return, $sarr);
        }

        return implode($return);
    }

    public static function alpha($page, $title = null, $metatags = [])
    {
        $firstmetatags = [
        '<meta charset="utf-8">',
        '<meta http-equiv="x-ua-compatible" content="ie=edge">',
        '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">',
        '<base href="'.kirby()->site()->url().'">',
        '<link rel="canonical" href="'.$page->url() .'">',
      ];
        $firstmetatags = array_merge($firstmetatags, $metatags);

        if ($title == null) {
            $title = \Kirby\Toolkit\Str::unhtml($page->title());
        }
        if ($title != false) {
            $firstmetatags[] = '<title>'.$title.'</title>';
        }

        $indent = option('bnomei.htmlhead.indent');
        $firstmetatags = array_map(function ($line) use ($indent) {
            return $indent.trim($line).PHP_EOL;
        }, $firstmetatags);
        return implode($firstmetatags).PHP_EOL;
    }

    public static function is_localhost()
    {
        $whitelist = array( '127.0.0.1', '::1' );
        if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            return true;
        }
    }
}
