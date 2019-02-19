<?php
    $load = option('bnomei.htmlhead.loadjs');
    if (is_array($load) && count($load) > 0):

    $loadID = '*';
    foreach ($load as $lkey => $lval) {
        if (in_array($page->intendedTemplate(), $lval['template'])) {
            $loadID = $lkey;
            break;
        }
    }

    $loadjs = implode(
        DIRECTORY_SEPARATOR,
        [
        __DIR__,    // ./snippets/htmlhead
            '..',      // ./snippets
            '..',      // ./
            'assets',  // ./assets
            'js',      // ./assets/js
            'loadjs.min.js'
        ]
    );

    if (Kirby\Toolkit\F::exists($loadjs)): ?>
    <script <?= $page->nonce('loadjs.min.js') ?>><?= Kirby\Toolkit\F::read($loadjs) ?></script>
    <script <?= $page->nonce('loadjs.min.js-fn') ?>>
        loadjs(
            [
                <?php
                    $dc = 0;
                    $deps = $load[$loadID]['dependencies'];
                    foreach ($deps as $dep) {
                        $dc++;
                        $prefix = '';
                        if (strpos($dep, 'css!') !== false) {
                            $prefix = 'css!';
                            $dep = str_replace('css!', '', $dep);
                        }
                        if (strpos($dep, 'img!') !== false) {
                            $prefix = 'img!';
                            $dep = str_replace('img!', '', $dep);
                        }
                        if (class_exists('\Bnomei\Fingerprint')) {
                            $dep = \Bnomei\Fingerprint::process($dep)['hash'];
                        }
                        echo "'" . $prefix.$dep . "'" . ($dc != count($deps) ? ',' : '').PHP_EOL    ;
                    }
                ?>
            ],
            {
                async: false // Fetch files in parallel and load them in series
            }
        );
    </script>
<?php
    endif; // exists
    endif; // loadjs
