<?php

declare(strict_types = 1);

namespace functional\core\dependencies\store;

use functional\core\ƒstore;

function set(string $key, $value) {
    $namespace = 'functional\core\dependencies';

    ƒstore::set($namespace, $key, $value);
}
