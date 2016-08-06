<?php

declare(strict_types = 1);

namespace functional\routes\store;

use functional\⦗store⦘;

function set(string $key, $value) {
    ⦗store⦘::set("functional\\routes", $key, $value);
}
