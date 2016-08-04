<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\set;
use function functional\helpers\error;
use function functional\helpers\format;

function register(string $key, callable $factory = null) {
    $function = bootstrap(
        'functional\\dependencies\\register', function(string $key, callable $factory = null) {
            if (!$factory) {
                $factory = $key;
            }

            $closure = Closure::fromCallable($factory);

            if (!$closure) {
                error(format('"%s" does not produce a closure', $key));
            }

            set($key, $closure);
        }
    );

    return $function($key, $factory);
}
