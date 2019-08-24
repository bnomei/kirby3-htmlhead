<?php

foreach (option('bnomei.htmlhead.js') as $dep) {
    if (class_exists('\Bnomei\Fingerprint')) {
        $integrity = true;
        if (strpos($dep, '|') !== false) {
            list($dep, $integrity) = explode('|', $dep);
        }
        echo Bnomei\Fingerprint::js($dep, ['integrity'=>$integrity]).PHP_EOL;
    } else {
        echo js($dep);
    }
}
