<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

function remove(string $key) {
    $namespace = 'functional\store';

    if (!isset($GLOBALS[$namespace])) {
        $GLOBALS[$namespace] = [];
    }

    unset($GLOBALS[$namespace][$key]);
}
