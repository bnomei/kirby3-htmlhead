<?php
$files = $files ?? [];
foreach ($files as $dep) {
    if (strlen(trim($dep)) === 0) {
        continue;
    }
    $options = [];
    if (strpos($dep, '|') !== false) {
        list($dep, $integrity) = explode('|', $dep);
        $options = [
            'integrity' => $integrity,
            'crossorigin' => 'anonymous',
        ];
    }
    if (class_exists('\Bnomei\Fingerprint')) {
        echo Bnomei\Fingerprint::js($dep, $options) . PHP_EOL;
    } else {
        echo js($dep, $options);
    }
}
