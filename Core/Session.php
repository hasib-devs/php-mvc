<?php

namespace Core;

class Session
{
    public const FLASH = '_flash';
    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null): mixed
    {
        return $_SESSION[static::FLASH][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        return (bool) static::get($key);
    }

    public static function flash(string $key, mixed $value): void
    {
        $_SESSION[static::FLASH][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION[static::FLASH]);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        $params = session_get_cookie_params();

        session_destroy();
        setcookie("PHPSESSID", '', time() - 3600, $params['path'], $params['domain']);
    }
}
