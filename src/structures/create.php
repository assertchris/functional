<?php

declare(strict_types = 1);

namespace functional\structures;

use function functional\dependencies\bootstrap;
use function functional\helpers\error;
use function functional\helpers\format;

function create($name, $definition) {
    $function = bootstrap(
        "functional\\structures\\create", function (string $name, array $definition) {
            $namespace = "functional\\structures";

            if (class_exists(format("%s\\%s", $namespace, $name))) {
                error(format('"%s" already exists'));
            }

            $code = format(
                'namespace %s; final class ⦗%s⦘ extends ⦗structure⦘ { protected $definition = %s; } function %s(array $data = []) { return new ⦗%s⦘($data); }',
                $namespace, $name, var_export($definition, true), $name, $name
            );

            eval($code);
        }
    );

    $function($name, $definition);
}
