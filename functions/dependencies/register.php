<?php

declare(strict_types = 1);

namespace functional\core\dependencies;

use Closure;
use functional\core\dependencies\store;

function ƒregister(string $key, callable $factory = null) {
    if (!$factory) {
        $factory = $key;
    }

    store\set($key, Closure::fromCallable($factory));
}

function register(...$parameters) {
    $function = bootstrap(
        'functional\core\dependencies\register', 'functional\core\dependencies\ƒregister'
    );

    return $function(...$parameters);
}
