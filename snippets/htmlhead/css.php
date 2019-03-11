<?php

foreach (option('bnomei.htmlhead.css') as $dep) {
    if (class_exists('\Bnomei\Fingerprint')) {
        $integrity = true;
        if(strpos($dep, '|') !== false) {
            list($dep, $integrity) = explode('|', $dep);
        }
        echo Bnomei\Fingerprint::css($dep, ['integrity'=>$integrity]).PHP_EOL;
    } else {
        echo css($dep);
    }
}
