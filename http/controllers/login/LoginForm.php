<?php

namespace Http\Controllers\Login;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate(string $email, string $password, array | bool $user): bool
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Email is required";
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = "Password is required";
        }

        if ($user) {
            if (! password_verify($password, $user['password'])) {
                $this->errors['password'] = "Password doesn't match";
            }
        } else {
            $this->errors['email'] = "Invalid email address";
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
