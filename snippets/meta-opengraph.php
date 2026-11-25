<meta property="og:url" content="<?= esc($url ?? $page->url()) ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= esc((string) ($title ?? $page->title())) ?>">
<meta property="og:description" content="<?= esc((string) ($description ?? $page->description())) ?>">
<?php if (isset($image)) { ?><meta property="og:image" content="<?= esc(is_string($image) ? $image : $image->url()) ?>">
<?php }
