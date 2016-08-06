<?php

declare(strict_types = 1);

namespace functional\routes;

use function functional\dependencies\bootstrap;
use function functional\structures\route;
use function functional\helpers\format;

function delete(...$parameters) {
    $function = bootstrap(
        "functional\\routes\\delete", function(string $pattern, callable $handler, array $options = null) {
            return create("delete", $pattern, $handler, $options);
        }
    );

    return $function(...$parameters);
}
