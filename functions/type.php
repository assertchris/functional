<?php

declare(strict_types = 1);

namespace functional\core;

use functional\core\structures\ƒstructure;
use function functional\core\dependencies\bootstrap;

function ƒtype($variable) {
    $checks = [
        'is_callable' => 'callable',
        'is_string' => 'string',
        'is_integer' => 'int',
        'is_float' => 'float',
        'is_null' => 'null',
        'is_bool' => 'bool',
        'is_array' => 'array',
    ];

    foreach ($checks as $key => $value) {
        if ($key($variable)) {
            return $value;
        }
    }

    if ($variable instanceof ƒstructure) {
        return $variable->class;
    }

    return 'unknown';
}

function type(...$parameters) {
    $function = bootstrap(
        'functional\core\type', 'functional\core\ƒtype'
    );

    return $function(...$parameters);
}
