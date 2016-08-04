<?php

declare(strict_types = 1);

namespace functional\helpers;

use function functional\dependencies\bootstrap;

function format($template, ...$parameters) {
    $function = bootstrap(
        'functional\\helpers\\format', function(string $template, ...$parameters) {
            return sprintf($template, ...$parameters);
        }
    );

    return $function($template, ...$parameters);
}
