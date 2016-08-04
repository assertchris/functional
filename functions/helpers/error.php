<?php

declare(strict_types = 1);

namespace functional\helpers;

use function functional\dependencies\bootstrap;

function error(...$parameters) {
    $function = bootstrap(
        'functional\helpers\error', function(...$parameters) {
            trigger_error(...$parameters);
        }
    );

    return $function(...$parameters);
}
