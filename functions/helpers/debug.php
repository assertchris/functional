<?php

declare(strict_types = 1);

namespace functional\helpers;

use function functional\dependencies\bootstrap;

function debug($value, bool $exit = true) {
    $function = bootstrap(
        'functional\helpers\debug', function($value, bool $exit = true) {
            print_r($value);

            if ($exit) {
                exit;
            }
        }
    );

    return $function($value, $exit);
}
