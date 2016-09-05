<?php

declare(strict_types = 1);

namespace functional\core\dependencies\store;

use functional\core\ƒstore;

function remove(string $key) {
    $namespace = 'functional\core\dependencies';

    ƒstore::remove($namespace, $key);
}
