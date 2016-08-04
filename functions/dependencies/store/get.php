<?php

namespace functional\dependencies\store;

function get(string $key = null) {
    $namespace = 'functional\store';

    if (!isset($GLOBALS[$namespace])) {
        $GLOBALS[$namespace] = [];
    }

    if (!$key) {
        return $GLOBALS[$namespace];
    }

    if (isset($GLOBALS[$namespace][$key])) {
        return $GLOBALS[$namespace][$key];
    }

    return null;
}
