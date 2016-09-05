<?php

declare(strict_types = 1);

namespace functional\core\dependencies\store;

use functional\core\ƒstore;

function get(string $key = null) {
    $namespace = 'functional\core\dependencies';

    if ($key === null) {
        return ƒstore::all($namespace);
    }

    return ƒstore::get($namespace, $key);
}
