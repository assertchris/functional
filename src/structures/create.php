<?php

declare(strict_types = 1);

namespace functional\structures;

use function functional\dependencies\bootstrap;
use function functional\helpers\error;
use function functional\helpers\format;

function create(...$parameters) {
    $function = bootstrap(
        "functional\\structures\\create", function (string $name, array $definition) {
            $namespace = "functional\\structures";

            if (class_exists(format("%s\\⦗%s⦘", $namespace, $name))) {
                error(format('"%s" already exists'));
            }

            $code = format(
                'namespace %1$s; final class ⦗%2$s⦘ extends ⦗structure⦘ { protected $⦗definition⦘ = %3$s; protected $⦗name⦘ = "%2$s"; } function %2$s(array $data = []) { return new ⦗%2$s⦘($data); }',
                $namespace, $name, var_export($definition, true)
            );

            eval($code);
        }
    );

    return $function(...$parameters);
}
