<?php

namespace Http\Controllers\Login;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate(string $email, string $password): bool
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Email is required";
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = "Password is required";
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message)
    {
        $this->errors[$field] = $message;
    }
}
