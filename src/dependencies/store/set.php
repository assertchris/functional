<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\__store__;

function set(string $key, $value) {
    $namespace = "functional\\dependencies";

    return __store__::set($namespace, $key, $value);
}
