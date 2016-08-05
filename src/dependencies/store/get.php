<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\⦗store⦘;

function get(string $key = null) {
    $namespace = "functional\\dependencies";

    if (!$key) {
        return ⦗store⦘::all($namespace);
    }

    return ⦗store⦘::get($namespace, $key);
}
