<?php

require __DIR__ . '/../vendor/autoload.php';

use functional\dependencies;

// register something in in the store

function fn() {
    return 'hello';
};

dependencies\register('function', 'fn');

// then get it back out again

$function = dependencies\resolve('function');
assert($function() == 'hello');

// override a built-in function

$previous = dependencies\resolve('functional\dependencies\register');

dependencies\register('functional\dependencies\register', function(string $key, callable $factory) use ($previous) {
    $previous($key, $factory);

    return sprintf('registered: %s', $key);
});

$register = dependencies\resolve('functional\dependencies\register');

// ...then, when we register the same key (with a new function), we should see different side-effects

$result = $register('function', function() {
    return 'world';
});
assert($result == 'registered: function');

$function = dependencies\resolve('function');
assert($function() == 'world');
