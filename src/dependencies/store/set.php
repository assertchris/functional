<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\ƒstore;

function set(string $key, $value) {
    $namespace = 'functional\dependencies';

    ƒstore::set($namespace, $key, $value);
}
