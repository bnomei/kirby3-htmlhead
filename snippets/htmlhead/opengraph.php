<?php
    // Facebook: https://developers.facebook.com/docs/sharing/webmasters#markup
    // Open Graph: http://ogp.me/
    $og_author = $page->head_author()->isNotEmpty() ? $page->head_author() : kirby()->site()->author();
    $og_image = $page->head_image()->isNotEmpty() ? $page->image($page->head_image()->value()) : $page->images()->first();
    $img = $page->hasImages() ? $og_image->resize(470)->url() : null;
    $htmlhead_og = option('bnomei.htmlhead.opengraph', [
        'og:title'          => \Kirby\Toolkit\Str::unhtml($page->title()),
        'og:type'           => 'website',
        'og:url'            => $page->url(),
        'og:image'          => $img,
        'og:image:width'    => $img ? $img->width() : '',
        'og:image:height'   => $img ? $img->height() : '',
        'og:site_name'      => site()->title(),
        'og:description'    => \Kirby\Toolkit\Str::unhtml($page->head_description()),
        'og:locale'         => str_replace('.UTF8', '', site()->locale()),
        'article:author'    => \Kirby\Toolkit\Str::unhtml($og_author),
    ]);
    if (!is_array($htmlhead_og)) {
        $htmlhead_og = [];
    }
    foreach ($htmlhead_og as $key => $value) {
        if (!$value) {
            continue;
        }
        echo \Kirby\Toolkit\Html::tag('meta', '', [
            'property' => $key,
            'content' => $value
        ]).PHP_EOL;
    }
