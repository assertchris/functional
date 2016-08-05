<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\__store__;

function remove(string $key) {
    $namespace = "functional\\dependencies";

    return __store__::remove($namespace, $key);
}
