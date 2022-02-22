<meta property="og:url" content="<?= $url ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $description ?>">
<?php if(isset($image)): ?><meta property="og:image" content="<?= is_string($image) ? $image : $image->url() ?>">
<?php endif;
