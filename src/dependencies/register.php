<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use functional\dependencies\store;

function ƒregister(string $key, callable $factory = null) {
    if (!$factory) {
        $factory = $key;
    }

    store\set($key, Closure::fromCallable($factory));
}

function register(...$parameters) {
    $function = bootstrap(
        'functional\dependencies\register', 'functional\dependencies\ƒregister'
    );

    return $function(...$parameters);
}
