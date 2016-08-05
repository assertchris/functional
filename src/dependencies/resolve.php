<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\get;
use function functional\helpers\error;
use function functional\helpers\format;

function resolve(...$parameters) {
    $function = bootstrap(
        "functional\\dependencies\\resolve", function(string $name) {
            if ($found = get($name)) {
                return $found;
            }

            error(format('"%s" is not registered', $name), $exit = false);
        }
    );

    return $function(...$parameters);
}
