<?php if (isset($urls)): foreach ($urls as $url): ?>
    <link rel="canonical" href="<?= is_array($url) ? A::get($url, 'url') : $url ?>">
<?php endforeach; endif;
