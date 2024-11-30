<meta property="og:url" content="<?= $url ?? $page->url() ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $title ?? $page->title() ?>">
<meta property="og:description" content="<?= $description ?? $page->description() ?>">
<?php if (isset($image)) { ?><meta property="og:image" content="<?= is_string($image) ? $image : $image->url() ?>">
<?php }
