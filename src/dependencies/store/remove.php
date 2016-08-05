<?php

declare(strict_types = 1);

namespace functional\dependencies\store;

use functional\⦗store⦘;

function remove(string $key) {
    $namespace = "functional\\dependencies";

    return ⦗store⦘::remove($namespace, $key);
}
