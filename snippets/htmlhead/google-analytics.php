<?php
$UA = $UA ?? '';
$disabled = strlen(trim($UA)) === 0 || kirby()->system()->isLocal() || option('debug');
$nonce = isset($nonce) ? 'nonce="'.$nonce.'"' : '';
$nonceAsync = $nonceAsync ?? null;
if (! $disabled): ?>
<script <?= $nonce ?>>
    var disableStr = 'ga-disable-<?= $UA ?>';
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
    }
    function gaOptout() {
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
    }
    (function(i,s,o,g,r,a,m){
        i['GoogleAnalyticsObject']=r;
        i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
        a=s.createElement(o),m=s.getElementsByTagName(o)[0];
        a.async=1;a.src=g;
        <?php if ($nonceAsync): ?>a.setAttribute('nonce', '<?= $nonceAsync ?>');<?php endif; ?>
        m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?= $UA ?>', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('send', 'pageview');
</script>
<?php endif;
