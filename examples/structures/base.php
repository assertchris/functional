<?php

declare(strict_types = 1);

require __DIR__ . '/../../vendor/autoload.php';

use functional\structures\⦗base⦘;
use function functional\helpers\debug;
use function functional\helpers\format;

class person extends ⦗base⦘
{
    protected $definition = [
        "first_name" => "string",
        "last_name" => "string",
    ];
}

$chris = new person([
    "first_name" => "chris",
    "last_name" => "pitt",
]);

debug($chris, false);
debug(format("%s\n", $chris->first_name), false);
debug(format("%s\n", $chris->last_name), false);
