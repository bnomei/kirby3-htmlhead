<?php

foreach (option('bnomei.htmlhead.css') as $dep) {
    if(class_exists('\Bnomei\Fingerprint')) {
        echo Bnomei\Fingerprint::css($dep, ['integrity'=>true]).PHP_EOL;
    } else {
        css($dep);
    }
}
