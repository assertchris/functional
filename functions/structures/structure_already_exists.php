<?php

declare(strict_types = 1);

namespace functional\core\structures;

use Exception;

final class structure_already_exists extends Exception
{
    public function __construct(string $name)
    {
        $message = $name . ' already exists';

        parent::__construct($message);
    }
}
