<?php

declare(strict_types = 1);

require __DIR__ . '/../../vendor/autoload.php';

use function functional\helpers\debug;
use function functional\helpers\format;
use function functional\structures\create;
use function functional\structures\person;

create("person", [
    "first_name" => "string",
    "last_name" => "string",
]);

$chris = person([
    "first_name" => "chris",
    "last_name" => "pitt",
]);

debug($chris, false);
debug(format("%s\n", $chris->first_name), false);
debug(format("%s\n", $chris->last_name), false);

// check for validation errors

set_error_handler(function($error, $message) {
    debug(format("error handled successfully: %s\n", $message), $exit = false);
});

// person();
//
// person([
//     "first_name" => 123,
//     "middle_name" => "george",
// ]);
