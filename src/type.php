<?php

declare(strict_types = 1);

namespace functional;

use function functional\dependencies\bootstrap;

function type($variable) {
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

            return "unknown";
        }
    );

    return $function($variable);
}
