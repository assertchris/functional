<?php

declare(strict_types = 1);

namespace functional\core\structures;

use Exception;

final class dependency_is_not_registered extends Exception
{
    public function __construct(string $name)
    {
        $message = $name . ' is not registered';

        parent::__construct($message);
    }
}
