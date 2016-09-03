<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use functional\dependencies\store;

function ƒresolve(string $name) {
    if ($found = store\get($name)) {
        return $found;
    }

    throw new dependency_is_not_registered($name);
}

function resolve(...$parameters) {
    $function = bootstrap(
        'functional\dependencies\resolve', 'functional\dependencies\ƒresolve'
    );

    return $function(...$parameters);
}
