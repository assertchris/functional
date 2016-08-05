<?php

declare(strict_types = 1);

require __DIR__ . "/../vendor/autoload.php";

use functional\dependencies;
use function functional\helpers\debug;
use function functional\helpers\format;

// register something in in the store

function greet() {
    return "hello world";
};

dependencies\register("greet");

// then get it back out again

assert(dependencies\resolve("greet")() == "hello world");

// override a built-in function

$previous = dependencies\resolve("functional\\dependencies\\register");

dependencies\register("functional\\dependencies\\register", function(string $key, callable $factory) use ($previous) {
    $previous($key, $factory);

    return format("registered: %s", $key);
});

// ...then, when we register the same key (with a new function), we should see different side-effects

$result = dependencies\register("greet", function($name) {
    return format("hello %s", $name);
});
assert($result == "registered: greet");

assert(dependencies\resolve("greet")("chris") == "hello chris");

// trigger a resolution error (to see that error and format work in that context)

set_error_handler(function($code, $message) {
    debug(format("error handled successfully: %s\n", $message), $exit = false);
});

dependencies\resolve("unregistered");

// create a dependency which can be overridden

function emboldener(...$parameters) {
    $function = dependencies\bootstrap(
        "custom\\emboldener", function(string $name) {
            return format("<b>%s</b>", $name);
        }
    );

    return $function(...$parameters);
}

debug(format("name is: %s\n", emboldener("chris")), $exit = false);

// ...but we've changed to using markdown!

dependencies\register("custom\\emboldener", function(string $name) {
    return format("**%s**", $name);
});

debug(format("name is: %s\n", emboldener("chris")), $exit = false);
