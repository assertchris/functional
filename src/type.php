<?php

declare(strict_types = 1);

namespace functional;

use functional\structures\⦗structure⦘;

use function functional\dependencies\bootstrap;

function type(...$parameters) {
    $function = bootstrap(
        "functional\\type", function($variable) {
            $checks = [
                "is_callable" => "callable",
                "is_string" => "string",
                "is_integer" => "int",
                "is_float" => "float",
                "is_null" => "null",
                "is_bool" => "bool",
                "is_array" => "array",
            ];

            foreach ($checks as $key => $value) {
                if ($key($variable)) {
                    return $value;
                }
            }

            if ($variable instanceof ⦗structure⦘) {
                return $variable->class;
            }

            return "unknown";
        }
    );

    return $function(...$parameters);
}
