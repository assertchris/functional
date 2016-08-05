# Dependencies

Dependencies are an essential part of any complex system. In OOP, we deal with all sorts of dependency problems, patterns like dependency injection, and principles like those in SOLID.

When all we have are functions, our only dependencies are function parameters. But there's another kind of dependency we could have. What if we wanted to make functions, the functionality of which could be overridden?

Most of the functions in this library allow for this by resolving their functionality as they are invoked. Consider the format function:

```php
use functional\helpers\format;

print format("name: %s", $name);
```

It's a simple wrapper for the `sprintf` function. What if we wanted to create a new `template` function, which ultimately uses the `format` function?

```php
use functional\dependencies\register;

register(
    "custom\\template",
    function(string $template, ...$parameters) {
        // do our fancy template stuff, passing values to format("some %s values", "template")
    }
);
```

We can change the underlying `format` function, substituting it for a fake implementation:

```php
use functional\dependencies\register;

register("functional\\helpers\\format", function(string $template, ...$parameters) {
    assertEquals("some %s values", $template);
    assertEquals("template", $parameters[0]);
});
```

## Making your functions work like this

You can use the same trick, with the `bootstrap` function:

```php
use functional\dependencies\bootstrap;

function template(...$parameters) {
    $function = bootstrap(
        "custom\\template",
        function(string $template, ...$parameters) {
            // do our fancy template stuff
        }
    );

    return $function(...$parameters);
}
```

The `bootstrap` function checks to see if `custom\template` is defined. If so, the applicable `Closure` is returned. If not, the provided `Closure` is stored. The resulting overhead (for subsequent calls to the `template` function) is relatively small.

> It's better to capture and use the outer `$parameters` with the rest and spread operators. This was overrides can change the type and number of required parameters. That's useful for expanding the allowed types and adding parameters for sub-implementations. Perhaps you would like to allow strings or arrays as the first parameter to your `template` function?

## Functions you can't override

There are few functions you can't override, in this way:

- `functional\dependencies\store\get`
- `functional\dependencies\store\remove`
- `functional\dependencies\store\set`
- `functional\dependencies\bootstrap`

You can change everything else!
