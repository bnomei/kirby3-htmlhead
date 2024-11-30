<!DOCTYPE html>
<html <?= $page->langAttr() ?>>
    <head>
        <?= $page->htmlhead() ?>
    </head>
    <body>
        <h1><?= $page->title() ?></h1>
        <?= $page->text()->kirbytext() ?>
    </body>
</html>
