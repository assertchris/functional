<?php

declare(strict_types = 1);

namespace functional\structures;

use function functional\dependencies\bootstrap;

function ƒcreate(string $name, array $definition) {
    $namespace = 'functional\structures';

    if (class_exists($namespace . '\ƒ' . $name)) {
        throw new structure_already_exists($name);
    }

    $code = sprintf(
        '
            namespace %1$s;

            final class ƒ%2$s extends ƒstructure {
                protected $ƒdefinition = %3$s;
                protected $ƒname = "%2$s";
            }

            function %2$s(array $data = []) {
                return new ƒ%2$s($data);
            }
        ',
        $namespace, $name, var_export($definition, true)
    );

    eval($code);
}

function create(...$parameters) {
    $function = bootstrap(
        'functional\structures\create', 'functional\structures\ƒcreate'
    );

    return $function(...$parameters);
}
