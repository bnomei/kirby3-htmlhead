<!DOCTYPE html>
<html <?= htmlhead()->langAttr() ?>>
    <head>
        <?= htmlhead()
            ->recommended_minimum()
            ->title()
            // ->link_preconnect()
            ->script_js([
                ['src' => '/assets/app.js', 'defer' => true, 'init' => true],
            ])
            ->link_css(['/assets/app.css'])
            // ->link_preload()
            // ->link_prefetch()
            ->base()
            // ->link_canonical()
            // ->link_alternates()
            // ->link_canonical()
            ->meta_robots()
            ->meta_author('...')
            ->meta_description($page->seodesc())
            ->meta_opengraph(description: $page->seodesc())
            ->link_feedrss()
            // site/snippets/my-snippet.php
            ->my_snippet(['key' => 'value'])
?>
    </head>
    <body>
        <h1><?= $page->title() ?></h1>
        <?= $page->text()->kirbytext() ?>
    </body>
</html>
