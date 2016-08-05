<?php

declare(strict_types = 1);

require __DIR__ . "/../vendor/autoload.php";

use functional\routes;
use function functional\helpers\debug;
use function functional\helpers\format;

function handleGreet($parameters) {
    debug($parameters->route->options, $exit = false);

    return "hello world";
}

routes\get("/greet", "handleGreet", [
    "middleware" => "auth"
]);

$not_found = routes\match("GET", "/");
debug($not_found, $exit = false);

$found = routes\match("GET", "/greet");
debug(format("%s\n", $found), $exit = false);

$method_not_allowed = routes\match("POST", "/greet");
debug($method_not_allowed, $exit = false);
