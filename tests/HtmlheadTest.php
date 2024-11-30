<?php

require_once __DIR__.'/../vendor/autoload.php';

use Bnomei\HTMLHead;

test('snippets', function () {
    $snippets = HTMLHead::singleton(page('home'))->render();
    expect($snippets)->toBeString();

    $this->assertStringContainsString('<title>Home</title>', $snippets);
    $this->assertStringContainsString('<base href="/">', $snippets);
    $this->assertStringContainsString('<meta name="robots" content="noindex, nofollow">', $snippets);
    $this->assertStringContainsString('<meta name="author" content="...">', $snippets);
    $this->assertStringContainsString('<meta name="description" content="Orgia de talis rector, manifestum nuptia.">', $snippets);
    $this->assertStringContainsString('<link href="/assets/app.css" rel="stylesheet">', $snippets);
    $this->assertStringContainsString('<script defer init src="/assets/app.js"></script>', $snippets);
    $this->assertStringContainsString('Home on my_snippet: value', $snippets);
    $this->assertStringContainsString('<link href="/feed" rel="alternate" title="Home" type="application/rss+xml">', $snippets);
});
