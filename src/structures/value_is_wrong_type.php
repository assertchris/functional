<?php

declare(strict_types = 1);

namespace functional\structures;

use Exception;

final class value_is_wrong_type extends Exception
{
    public function __construct(string $property, string $expected_type, string $actual_type, string $name)
    {
        $message = $property . '<' . $expected_type . '> was set to <' . $actual_type . '> for this ' . $name;

        parent::__construct($message);
    }
}
