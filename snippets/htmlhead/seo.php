 <?php

 use Kirby\Toolkit\Html;
 use Kirby\Toolkit\Str;

 $seo_author = $page->head_author()->isNotEmpty() ? $page->head_author() : kirby()->site()->author();
    $htmlhead_seo = option('bnomei.htmlhead.seo', [
        'author'      => Str::unhtml($seo_author),
        'description' => Str::unhtml($page->head_description()),
        'robots'      => 'index, follow, noodp',
    ]);
    if (!is_array($htmlhead_seo)) {
        $htmlhead_seo = [];
    }
    foreach ($htmlhead_seo as $key => $value) {
        echo Html::tag('meta', '', [
            'property' => $key,
            'content' => $value
        ]).PHP_EOL;
    }
?>
