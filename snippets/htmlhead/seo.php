 <?php
    $seo_author = $page->head_author()->isNotEmpty() ? $page->head_author() : kirby()->site()->author();
    $htmlhead_seo = option('bnomei.htmlhead.seo', [
        'author'      => \Kirby\Toolkit\Str::unhtml($seo_author),
        'description' => \Kirby\Toolkit\Str::unhtml($page->head_description()),
        'robots'      => 'index, follow, noodp',
    ]);
    if (!is_array($htmlhead_seo)) {
        $htmlhead_seo = [];
    }
    foreach ($htmlhead_seo as $key => $value) {
        echo \Kirby\Toolkit\Html::tag('meta', '', [
            'property' => $key,
            'content' => $value
        ]).PHP_EOL;
    }
?>
