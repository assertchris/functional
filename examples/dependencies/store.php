<?php

declare(strict_types = 1);

require __DIR__ . "/../../vendor/autoload.php";

use functional\dependencies\store;
use function functional\helpers\debug;

// get the empty store

$store = store\get();
assert(is_array($store));

// add something to it

store\set("foo", "bar");

$store = store\get();
assert(store\get("foo") === "bar");

// then remove it

store\remove("foo");

$store = store\get();
assert(store\get("foo") === null);
