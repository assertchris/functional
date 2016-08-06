<?php

declare(strict_types = 1);

namespace functional\routes;

use functional\⦗store⦘;

use function functional\dependencies\bootstrap;
use function functional\structures\route;
use function functional\helpers\format;

function create(...$parameters) {
    $function = bootstrap(
        "functional\\routes\\create", function(string $method, string $pattern, callable $handler, array $options = null) {
            $namespace = "functional\\routes";

            if (!$options) {
                $options = [];
            }

            $route = route([
                "method" => strtoupper($method),
                "pattern" => $pattern,
                "handler" => $handler,
                "options" => $options,
            ]);

            ⦗store⦘::set($namespace, format("%s:%s", $method, $pattern), $route);
        }
    );

    return $function(...$parameters);
}
