<?php

declare(strict_types = 1);

namespace functional\dependencies;

use Closure;

use functional\dependencies\store;

use function functional\helpers\error;
use function functional\helpers\format;

function resolve(...$parameters) {
    $function = bootstrap(
        "functional\\dependencies\\resolve", function(string $name) {
            if ($found = store\get($name)) {
                return $found;
            }

            error(format('"%s" is not registered', $name), false);
        }
    );

    return $function(...$parameters);
}
