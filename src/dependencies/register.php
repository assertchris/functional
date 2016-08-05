<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\set;
use function functional\helpers\error;
use function functional\helpers\format;

function register(...$parameters) {
    $function = bootstrap(
        "functional\\dependencies\\register", function(string $key, callable $factory = null) {
            if (!$factory) {
                $factory = $key;
            }

            set($key, Closure::fromCallable($factory));
        }
    );

    return $function(...$parameters);
}
