<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;

use functional\dependencies\store;

use function functional\helpers\error;
use function functional\helpers\format;

function register(...$parameters) {
    $function = bootstrap(
        "functional\\dependencies\\register", function(string $key, callable $factory = null) {
            if (!$factory) {
                $factory = $key;
            }

            store\set($key, Closure::fromCallable($factory));
        }
    );

    return $function(...$parameters);
}
