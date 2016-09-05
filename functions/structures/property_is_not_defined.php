<?php

declare(strict_types = 1);

namespace functional\core\structures;

use Exception;

final class property_is_not_defined extends Exception
{
    public function __construct(string $property, string $name)
    {
        $message = $property . ' is not defined for this ' . $name;

        parent::__construct($message);
    }
}
