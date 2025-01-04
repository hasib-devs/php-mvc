<?php
class Validator
{
    public static function string(string $value, int $min = 1, int $max = PHP_INT_MAX): bool
    {
        $len = strlen($value);
        return $len >= $min && $len <= $max;
    }
}
