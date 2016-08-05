<?php

declare(strict_types = 1);

namespace functional;

final class __store__
{
    public static function get(string $namespace, string $key)
    {
        if (self::exists($namespace, $key)) {
            return $GLOBALS[$namespace][$key];
        }

        return null;
    }

    private static function init(string $namespace)
    {
        if (!isset($GLOBALS[$namespace])) {
            $GLOBALS[$namespace] = [];
        }
    }

    public static function all(string $namespace) : array
    {
        self::init($namespace);

        return $GLOBALS[$namespace];
    }

    public static function set(string $namespace, string $key, $value)
    {
        self::init($namespace);

        $GLOBALS[$namespace][$key] = $value;
    }

    public static function exists(string $namespace, string $key)
    {
        self::init($namespace);

        return isset($GLOBALS[$namespace][$key]);
    }

    public static function remove(string $namespace, string $key)
    {
        self::init($namespace);

        unset($GLOBALS[$namespace][$key]);
    }
}
