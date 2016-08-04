<?php

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\set;

function register(string $key, callable $factory) {
    $function = bootstrap(
        'functional\dependencies\register', function(string $key, callable $factory) {
            $closure = Closure::fromCallable($factory);

            if (!$closure) {
                trigger_error(sprintf('"%s" does not produce a closure', $key));
            }

            set($key, $closure);
        }
    );

    return $function($key, $factory);
}
