<?php

declare(strict_types = 1);

namespace functional\core\dependencies;

use Closure;
use functional\core\dependencies\store;

function ƒresolve(string $name) {
    if ($found = store\get($name)) {
        return $found;
    }

    throw new dependency_is_not_registered($name);
}

function resolve(...$parameters) {
    $function = bootstrap(
        'functional\core\dependencies\resolve', 'functional\core\dependencies\ƒresolve'
    );

    return $function(...$parameters);
}
