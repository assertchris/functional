<?php

declare(strict_types = 1);

namespace functional\routes;

use functional\⦗store⦘;
use function functional\dependencies\bootstrap;
use function functional\structures\route;
use function functional\helpers\format;

function get($path, $options = [], $handler = null) {
    $function = bootstrap(
        "functional\\routes\\get", function(string $path, callable $handler, array $options = null) {
            $namespace = "functional\\routes";

            if (!$options) {
                $options = [];
            }

            $route = route([
                "method" => "GET",
                "path" => $path,
                "handler" => $handler,
                "options" => $options,
            ]);

            ⦗store⦘::set($namespace, format('GET:%s', $path), $route);
        }
    );

    $function($path, $options, $handler);
}
