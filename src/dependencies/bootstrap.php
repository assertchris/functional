<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\get;
use function functional\dependencies\store\set;

function bootstrap(string $key, callable $factory) : Closure {
    if ($found = get($key)) {
        return $found;
    }

    $closure = Closure::fromCallable($factory);

    set($key, $closure);

    return $closure;
}
