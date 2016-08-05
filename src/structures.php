<?php

declare(strict_types = 1);

namespace functional;

use function functional\structures\create;

create("route", [
    "method" => "string",
    "path" => "string",
    "handler" => "callable",
    "options" => "array",
]);

create("route_match_not_found", [
    "method" => "string",
    "path" => "string",
]);

create("route_match_found", [
    "route" => "mixed",
    "variables" => "array",
]);

create("route_match_method_not_allowed", [
    "allowed_methods" => "array",
]);
