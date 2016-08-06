<?php

declare(strict_types = 1);

require __DIR__ . "/../vendor/autoload.php";

use function functional\helpers\debug;
use function functional\helpers\format;
use function functional\structures\create;
use function functional\structures\person;
use function functional\type;

create("person", [
    "first_name" => "string",
    "last_name" => "string",
]);

$chris = person([
    "first_name" => "chris",
    "last_name" => "pitt",
]);

debug($chris, false);
debug(format("first_name: %s\n", $chris->first_name), $exit = false);
debug(format("last_name: %s\n", $chris->last_name), $exit = false);

// check for validation errors

set_error_handler(function($error, $message) {
    debug(format("error handled successfully: %s\n", $message), $exit = false);
});

person();

person([
    "first_name" => 123,
    "middle_name" => "george",
]);

$chris->middle_name;

// check for the type of this structure

debug(format("type: %s\n", type($chris)), $exit = false);

// check setting values

$chris->first_name = "christopher";

debug(format("modified first_name: %s\n", $chris->first_name), $exit = false);
