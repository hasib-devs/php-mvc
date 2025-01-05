<?php

namespace Core;
use Exception;

class Container
{
    protected array $bindings = [];
    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }
    public function resolve(string $key): mixed
    {
        if (isset($this->bindings[$key])) {
            return $this->bindings[$key]();
        }
        throw new Exception("No binding found for key: $key");
    }
}
