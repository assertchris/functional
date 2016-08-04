<?php

namespace functional\dependencies\store;

function set(string $key, $value) {
    $namespace = 'functional\store';

    if (!isset($GLOBALS[$namespace])) {
        $GLOBALS[$namespace] = [];
    }

    $GLOBALS[$namespace][$key] = $value;
}
