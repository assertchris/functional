<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\ƒstore;

function get(string $key = null) {
    $namespace = 'functional\dependencies';

    if ($key === null) {
        return ƒstore::all($namespace);
    }

    return ƒstore::get($namespace, $key);
}
