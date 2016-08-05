<?php

declare(strict_types = 1);

namespace functional\helpers;

use function functional\dependencies\bootstrap;

function debug(...$parameters) {
    $function = bootstrap(
        "functional\\helpers\\debug", function($value, $exit = true) {
            print_r($value);

            if ($exit) {
                exit;
            }
        }
    );

    return $function(...$parameters);
}
