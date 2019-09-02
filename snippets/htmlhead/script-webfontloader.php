<?php
// https://github.com/typekit/webfontloader
// 1) Load the Webfontloader file using script-js snippet
// 2) Recommended: set a nonce with https://github.com/bnomei/kirby3-security-headers
// 3) pass json as string or array to snippet
?>
<script <?= $nonce ?? '' ?>>
    WebFont.load(<?= is_array($json) ? json_encode($json, JSON_PRETTY_PRINT) : $json ?>);
</script>
