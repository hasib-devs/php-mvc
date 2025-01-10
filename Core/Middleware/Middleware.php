<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve(string $key)
    {
        $middleware = static::MAP[$key] ?? false;
        if (! $middleware) {
            throw new \Exception("No matching middleware found for '$key'");
        }
        (new $middleware)->handle();
    }
}
