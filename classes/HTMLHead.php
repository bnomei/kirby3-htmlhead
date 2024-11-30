<?php

declare(strict_types=1);

namespace Bnomei;

use Closure;
use Kirby\Cms\Page;
use ReflectionMethod;

use function option;
use function snippet;

/**
 * @method HTMLHead link_a11ycss(array|Closure|null $data = null)
 * @method HTMLHead link_csswizardry_ct(array|Closure|null $data = null)
 * @method HTMLHead link_feedrss(array|Closure|null $data = null)
 */
class HTMLHead
{
    use HTMLHeadSnippets;

    private Page $page;

    private array $snippets;

    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->snippets = (array) option('bnomei.htmlhead.snippets', []);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __call(string $name, array $arguments): self
    {
        $args = [];
        if (count($arguments) === 1 && (is_array($arguments[0]) || $arguments[0] instanceof Closure)) {
            $args = $arguments[0];
        }

        $this->snippets[str_replace('_', '-', $name)] = $args;

        return $this;
    }

    public function render(): string
    {
        $text = [];
        foreach ($this->snippets as $name => $value) {
            $text[] = $this->processSnippet($name, $value, $this->page);
        }

        return implode(PHP_EOL, $text);
    }

    private function processSnippet(string $name, mixed $value, Page $page): string
    {
        if ($value instanceof Closure) {
            // bindTo is needed to make sure the closure has access to the page object as $this
            $value = $value->bindTo($page, $page)->__invoke($page);
        }

        if (! $value || ! is_array($value)) {
            $value = [];
        }

        // try kebab-case first
        $r = strval(snippet($name, array_merge(['page' => $page], $value), true));
        if (empty($r)) {
            // try snake_case
            return strval(snippet(str_replace('-', '_', $name), array_merge(['page' => $page], $value), true));
        }

        return $r;
    }

    public function langAttr(): string
    {
        return kirby()->language() ? 'lang="'.kirby()->language()->code().'"' : '';
    }

    public function snip(string $functionName, array $data = []): self
    {
        $reflection = new ReflectionMethod($this, $functionName);
        $this->snippets[str_replace('_', '-', $reflection->getName())] = $data;

        return $this;
    }

    private static ?self $singleton = null;

    public static function singleton(?Page $page = null): self
    {
        if (self::$singleton === null) {
            if (! $page) {
                throw new \Exception('HTMLHead singleton needs a page object.');
            }
            self::$singleton = new self($page);
        }

        return self::$singleton;
    }
}
