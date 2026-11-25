<?php

use Bnomei\HTMLHead;
use Kirby\Cms\App;

App::$enableWhoops = false;

test('snippets', function () {
    $kirby = new App(['roots' => ['index' => __DIR__]]);
    $snippets = $kirby->render()->body();
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

test('description and Open Graph metadata preserve editor punctuation', function () {
    $kirby = new App(['roots' => ['index' => __DIR__]]);
    $description = 'A "quoted" title & more <details>';
    $page = $kirby->page('home')->clone([
        'content' => ['seodesc' => $description],
    ]);

    $head = (new HTMLHead($page))
        ->title($description)
        ->meta_description($page->seodesc())
        ->meta_opengraph(title: $description, description: $page->seodesc())
        ->render();

    $document = new DOMDocument;
    $document->loadHTML('<!doctype html><html><head>'.$head.'</head><body></body></html>');
    $xpath = new DOMXPath($document);

    expect($xpath->evaluate('string(//meta[@name="description"]/@content)'))->toBe($description)
        ->and($xpath->evaluate('string(/html/head/title)'))->toBe($description)
        ->and($xpath->evaluate('string(//meta[@property="og:title"]/@content)'))->toBe($description)
        ->and($xpath->evaluate('string(//meta[@property="og:description"]/@content)'))->toBe($description);
});
