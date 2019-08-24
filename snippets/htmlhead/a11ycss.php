<?php
    $htmlhead_a11y_debugOnly = option('bnomei.htmlhead.a11ycssdebugOnly');
    if (is_null($htmlhead_a11y_debugOnly)) {
        $htmlhead_a11y_debugOnly = option('debug', false);
    }
    $htmlhead_a11y = option('bnomei.htmlhead.a11ycss');

    if ($htmlhead_a11y_debugOnly && Kirby\Toolkit\V::url($htmlhead_a11y)) {
        echo css($htmlhead_a11y, 'screen').PHP_EOL;
    }
