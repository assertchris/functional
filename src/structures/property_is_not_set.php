<?php

declare(strict_types = 1);

namespace functional\structures;

use Exception;

final class property_is_not_set extends Exception
{
    public function __construct(string $property, string $type, string $name)
    {
        $message = $property . '<' . $type . '> is not set for this ' . $name;

        parent::__construct($message);
    }
}
