	<?php

    use Bnomei\HTMLHead;

    $htmlhead_googleanalytics = option('bnomei.htmlhead.googleanalytics');
    $htmlhead_googleanalytics_anonymizeIp = option('bnomei.htmlhead.googleanalytics.anonymizeIp');

    if (!HTMLHead::is_localhost() && strlen($htmlhead_googleanalytics) > strlen("UA-")): ?>
    <script <?= $page->nonce('ga1') ?>>
    var gaProperty = '<?php echo $htmlhead_googleanalytics ?>';
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) { window[disableStr] = true;
    }
    function gaOptout() {
    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
    window[disableStr] = true; }
    </script>
    <script <?= $page->nonce('ga2') ?>>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;a.setAttribute('nonce', '<?= $page->nonce('ga3', true) ?>');m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo $htmlhead_googleanalytics ?>', 'auto');
      <?php if ($htmlhead_googleanalytics_anonymizeIp): ?>
      ga('set', 'anonymizeIp', true);
      <?php endif; ?>
      ga('send', 'pageview');
    </script>
    <?php endif; ?>
