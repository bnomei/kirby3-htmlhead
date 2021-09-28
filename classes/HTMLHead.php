<?php

declare(strict_types=1);

namespace Bnomei;

use Kirby\Cms\Page;
use function option;
use function snippet;

final class HTMLHead
{
    public static function snippets(Page $page, $snippets = []): string
    {
        $defaults = option('bnomei.htmlhead.snippets', []);
        $snippets = array_merge($defaults, $snippets);
        $text = [];

        foreach ($snippets as $snippetname => $options) {
            if ($options && is_callable($options)) {
                $options = $options(kirby(), kirby()->site(), $page);
            }
            if (! $options || ! is_array($options)) {
                $options = [];
            }
            $text[] = snippet(
                $snippetname,
                array_merge(['page' => $page], $options),
                true
            );
        }

        return implode(PHP_EOL, $text);
    }
}
