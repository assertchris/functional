<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\get;
use function functional\dependencies\store\set;
use function functional\helpers\error;
use function functional\helpers\format;

function bootstrap(string $key, callable $factory) : Closure {
    if ($found = get($key)) {
        return $found;
    }

    $closure = Closure::fromCallable($factory);

    if (!$closure) {
        error(format('"%s" does not produce a closure', $key));
    }

    set($key, $closure);

    return $closure;
}
