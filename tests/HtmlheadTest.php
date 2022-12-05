<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bnomei\HTMLHead;
use PHPUnit\Framework\TestCase;

final class HtmlheadTest extends TestCase
{
    public function testSnippets()
    {
        $this->setOutputCallback(function () {
        });

        $snippets = HTMLHead::snippets(page('home'));
        $this->assertIsString($snippets);

        $this->assertStringContainsString('<title>Home</title>', $snippets);
        $this->assertStringContainsString('<base href="/">', $snippets);
        $this->assertStringContainsString('<meta name="robots" content="index, follow, noodp">', $snippets);
        $this->assertStringContainsString('<meta name="author" content="">', $snippets);
        $this->assertStringContainsString('<meta name="description" content="Orgia de talis rector, manifestum nuptia.">', $snippets);
        $this->assertStringContainsString('<link href="/assets/app.css" rel="stylesheet">', $snippets);
        $this->assertStringContainsString('<script src="/assets/app.js"></script>', $snippets);
        $this->assertStringContainsString('<link href="https://github.com/ffoodd/a11y.css/blob/master/css/a11y-en_errors-only.css" media="screen" rel="stylesheet">', $snippets);
        $this->assertStringContainsString('<link href="/feed" rel="alternate" title="Home" type="application/rss+xml">', $snippets);
    }
}
