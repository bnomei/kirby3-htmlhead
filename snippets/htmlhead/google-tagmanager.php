<?php
$UA = $UA ?? '';
$disabled = strlen(trim($UA)) === 0 || kirby()->system()->isLocal() || option('debug');
$nonce = isset($nonce) ? 'nonce="'.$nonce.'"' : '';
$nonceAsync = $nonceAsync ?? null;
if (! $disabled): ?>
<script <?= $nonce ?>>
    (function(w,d,s,l,i){w[l]=w[l]||[];
    w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
    var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
    j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
    <?php if ($nonceAsync): ?>j.setAttribute('nonce', '<?= $nonceAsync ?>');<?php endif; ?>
    f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= $UA ?>');</script>
<?php endif;
