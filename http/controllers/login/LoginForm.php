<?php

namespace Http\Controllers\Login;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Email is required";
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = "Password is required";
        }
    }

    public static function validate(array $attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() :  $instance;
    }

    public function throw(): never
    {
        throw ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed(): bool
    {
        return ! empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
