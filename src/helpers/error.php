<?php

declare(strict_types = 1);

namespace functional\helpers;

use function functional\dependencies\bootstrap;

function error($message, $exit = true, $type = E_USER_NOTICE) {
    $function = bootstrap(
        "functional\\helpers\\error", function(string $message, $exit = true, $type = E_USER_NOTICE) {
            trigger_error($message, $type);

            if ($exit) {
                exit;
            }
        }
    );

    return $function($message, $exit, $type);
}
