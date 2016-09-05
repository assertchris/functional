<?php

declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use functional\core\structures\property_is_not_defined;
use functional\core\structures\property_is_not_set;
use functional\core\structures\structure_already_exists;
use functional\core\structures\value_is_wrong_type;
use function functional\core\structures\create;
use function functional\core\structures\person;
use function functional\core\type;

function debug(...$message) {
    print join(' ', $message) . "\n";
}

create('person', [
    'first_name' => 'string',
    'last_name' => 'string',
]);

try {
    create('person', []);
}
catch (structure_already_exists $exception) {
    debug($exception->getMessage());
}

$chris = person([
    'first_name' => 'chris',
    'last_name' => 'pitt',
]);

debug('first_name →', $chris->first_name);
debug('last_name →', $chris->last_name);

try {
    person();
}
catch (property_is_not_set $exception) {
    debug($exception->getMessage());
}

try {
    person([
        'first_name' => 123,
        'middle_name' => 'george',
    ]);
}
catch (value_is_wrong_type $exception) {
    debug($exception->getMessage());
}
catch (property_is_not_defined $exception) {
    debug($exception->getMessage());
}

try {
    $chris->middle_name;
}
catch (property_is_not_defined $exception) {
    debug($exception->getMessage());
}

debug('type →', type($chris));

$chris->first_name = 'christopher';

debug('first_name →',  $chris->first_name);
