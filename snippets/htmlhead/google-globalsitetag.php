<?php
$UA = $UA ?? '';
$disabled = strlen(trim($UA)) === 0 || kirby()->system()->isLocal() || option('debug');
$nonce = $nonce ?? '';
$nonceAsync = $nonceAsync ?? '';
if (! $disabled): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $UA ?>" <?= $nonceAsync ?>></script>
<script <?= $nonce ?>>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', '<?= $UA ?>');
</script>
<?php endif;
