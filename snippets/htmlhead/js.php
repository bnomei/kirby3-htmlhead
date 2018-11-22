<?php

foreach (option('bnomei.htmlhead.js') as $dep) {
    if(class_exists('\Bnomei\Fingerprint')) {
        echo Bnomei\Fingerprint::js($dep, ['integrity'=>true]).PHP_EOL;
    } else {
        js($dep);
    }
}
