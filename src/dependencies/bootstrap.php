<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;

use functional\dependencies\store;

function bootstrap(string $key, callable $factory) : Closure {
    if ($found = store\get($key)) {
        return $found;
    }

    $closure = Closure::fromCallable($factory);

    store\set($key, $closure);

    return $closure;
}
