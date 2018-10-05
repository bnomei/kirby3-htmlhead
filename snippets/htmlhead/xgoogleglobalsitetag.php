<?php
  $ga = option('bnomei.htmlhead.googleglobalsitetag');
  if (!\Bnomei\HTMLHead::is_localhost() && strlen($ga) > 3):
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $ga ?>" <?= $page->nonce('ga1') ?>></script>
<script <?= $page->nonce('ga2') ?>>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', '<?= $ga ?>');
</script>
<?php endif;
