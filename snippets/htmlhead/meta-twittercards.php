<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="<?= $domain ?>">
<meta property="twitter:url" content="<?= $url ?>">
<meta name="twitter:title" content="<?= $title ?>">
<meta name="twitter:description" content="<?= $description ?>">
<?php if(isset($image)): ?><meta name="twitter:image" content="<?= is_string($image) ? $image : $image->url() ?>">
<?php endif;
