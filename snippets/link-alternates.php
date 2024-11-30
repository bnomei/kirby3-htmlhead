<?php if (isset($urls)) {
    foreach ($urls as $url) { ?>
<link rel="alternate" hreflang="<?= is_array($url) ? A::get($url, 'lang') : '' ?>" href="<?= is_array($url) ? A::get($url, 'url') : $url ?>">
<?php }
    }
