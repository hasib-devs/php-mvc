<?php

namespace Core;

class App
{
    protected static Container $container;
    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function resolve(string $key)
    {
        return static::container()->resolve($key);
    }
}
