<?php
  $ga = option('bnomei.htmlhead.googletagmanager');
  if (!\Bnomei\HTMLHead::is_localhost() && strlen($ga) > 4):
?>
<script <?= $page->nonce('ga1') ?>>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;j.setAttribute('nonce', '<?= $page->nonce('ga2', true) ?>');f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= $ga ?>');</script>
<?php endif;
