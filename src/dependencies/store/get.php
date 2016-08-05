<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\__store__;

function get(string $key = null) {
    $namespace = "functional\\dependencies";

    if (!$key) {
        return __store__::all($namespace);
    }

    return __store__::get($namespace, $key);
}
