<?php
    $htmlhead_webfontloader = option('bnomei.htmlhead.webfontloader');
    if ($htmlhead_webfontloader && is_string($htmlhead_webfontloader)):
?>
<?php echo js('/media/plugins/bnomei/htmlhead/js/webfontloader.js').PHP_EOL; ?>
<script <?= $page->nonce('webfontloader.js') ?>>
WebFont.load({
  <?= $htmlhead_webfontloader ?>
});
</script>
<?php endif;
