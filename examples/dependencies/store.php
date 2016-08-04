<?php

require __DIR__ . '/../../vendor/autoload.php';

use functional\dependencies\store;

// get the empty store

$store = store\get();
assert(count($store) == 0);

// add something to it

store\set("foo", "bar");

$store = store\get();
assert(count($store) === 1);
assert(store\get("foo") === "bar");

// then remove it

store\remove("foo");

$store = store\get();
assert(count($store) == 0);
