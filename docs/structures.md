# Structures

Sometimes the humble associative array just isn't enough. We need to send something more than a boolean or a string. Something which conveys a larger structure, like an application route, or a user database record.

Many languages support complex arrangements of simpler variables, and a few of them even call it the Structure (or `struct` for short). There is no native `struct` keyword in PHP. But don't let that stop you!

You can use the `functional\structures\create` function to make something similar:

```php
use function functional\structures\create;

create("route", [
    "method" => "string",
    "pattern" => "string",
    "handler" => "callable",
]);

$profile_route = route([
    "method" => "GET",
    "pattern" => "/u/{username}",
    "handler" => "showProfile",
]);
```

`create("route", [...])` creates a new structure, and a function of the same name with which to create new instances of the structure.

> The `create` function actually builds a class behind the scenes. If you were to create a new instance of the `route` structure, and inspected the value, you'd see an object called `⦗route⦘`. Classes are an efficient way to validate structural input. It's possible to get by without the use of classes, but it's best to think about them as an internal design detail.

## Checking types

Given a structural instance, you can find out what type it is by using the `functional\type` function:

```php
use function functional\type;

print type($profile_route); // prints "route"
```
