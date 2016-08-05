<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\⦗store⦘;

function set(string $key, $value) {
    $namespace = "functional\\dependencies";

    return ⦗store⦘::set($namespace, $key, $value);
}
