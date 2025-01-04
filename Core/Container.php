<?php

namespace Core;

use Closure;
use Exception;

class Container
{
    protected array $bindings = [];
    public function bind(string $key, Closure $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
    public function resolve(string $key)
    {
        if (isset($this->bindings[$key])) {
            return $this->bindings[$key]();
        }
        throw new Exception("No binding found for key: $key");
    }
}
