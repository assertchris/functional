<?php

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\get;
use function functional\dependencies\store\set;

function bootstrap(string $key, callable $factory) : Closure {
    if ($found = get($key)) {
        return $found;
    }

    $closure = Closure::fromCallable($factory);

    if (!$closure) {
        trigger_error(sprintf('"%s" does not produce a closure', $key));
    }

    set($key, $closure);

    return $closure;
}
