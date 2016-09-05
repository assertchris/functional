<?php

declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

class ƒflow
{
    private $state;
    private $closure;
    private $hash;

    public function __construct(callable $callable)
    {
        $this->closure = Closure::fromCallable($callable);
        $this->hash = $hash = spl_object_hash($this);
        $GLOBALS[$hash] = $this;
    }

    public function __invoke(...$parameters)
    {
        return call_user_func_array($this->closure, $parameters);
    }

    public function __get($property)
    {
        if ($property === "hash") {
            return $this->hash;
        }

        if ($property === "state") {
            return $this->state;
        }
    }

    public function __set($property, $value)
    {
        if ($property === "state") {
            $this->state = $value;
        }
    }
}

class not_in_flow extends Exception {}

function ƒget() {
    $backtrace = debug_backtrace();

    if (!isset($backtrace[1])) {
        throw new not_in_flow();
    }

    $i = 1;
    $parent = $backtrace[$i++];

    while (!isset($parent["class"]) || $parent["class"] !== "ƒflow") {
        if (!isset($backtrace[$i + 1])) {
            throw new not_in_flow();
        }

        $parent = $backtrace[$i++];
    }

    try {
        return $GLOBALS[$parent["object"]->hash];
    }
    catch (Exception $e) {
        throw new not_in_flow();
    }
}

function pipe($context) {
    $flow = ƒget();
    $flow->state = $context;
}

function pull() {
    $flow = ƒget();
    return $flow->state;
}

function flow(callable $callable, ...$pass) {
    $flow = new ƒflow($callable);
    return $flow(...$pass);
}

function foo($new) {
    return "{$new}";
}

function bar($new, $old) {
    return "{$old} → {$new}";
}

function baz($new, $old) {
    return "{$old} → {$new}";
}

print flow(function() {
    pipe(foo("value 1"));
    pipe(bar("value 2", pull()));
    pipe(baz("value 3", pull()));

    return pull();
});

// "value 1 → value 2 → value 3"

pipe("value");
