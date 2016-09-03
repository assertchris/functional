<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\ƒstore;

function remove(string $key) {
    $namespace = 'functional\dependencies';

    ƒstore::remove($namespace, $key);
}
