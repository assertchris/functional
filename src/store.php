<?php

declare(strict_types = 1);

namespace functional;

final class ƒstore
{
    private static $data = [];

    public static function get(string $namespace, string $key)
    {
        if (self::exists($namespace, $key)) {
            return self::$data[$namespace][$key];
        }

        return null;
    }

    public static function exists(string $namespace, string $key)
    {
        self::init($namespace);

        return isset(self::$data[$namespace][$key]);
    }

    private static function init(string $namespace)
    {
        if (!isset(self::$data[$namespace])) {
            self::$data[$namespace] = [];
        }
    }

    public static function all(string $namespace) : array
    {
        self::init($namespace);

        return self::$data[$namespace];
    }

    public static function set(string $namespace, string $key, $value)
    {
        self::init($namespace);

        self::$data[$namespace][$key] = $value;
    }

    public static function remove(string $namespace, string $key)
    {
        self::init($namespace);

        unset(self::$data[$namespace][$key]);
    }
}
