<?php

namespace functional\dependencies;

use Closure;
use function functional\dependencies\store\contains;
use function functional\dependencies\store\get;

function resolve($name) : Closure {
    $function = bootstrap(
        'functional\dependencies\resolve', function(string $name) : Closure {
            if ($found = get($name)) {
                return $found;
            }

            trigger_error(sprintf('"%s" is not registered', $name));
        }
    );

    return $function($name);
}
