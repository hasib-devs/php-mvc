<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password)
    {
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT id, name, email, password FROM users WHERE email = :email", ['email' => $email])->find();

        if ($user) {
            if (! password_verify($password, $user['password'])) {
                return false;
            }
        } else {
            return false;
        }

        $this->login($user);
        return $user;
    }

    private function login(array &$user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        $params = session_get_cookie_params();

        session_destroy();
        setcookie("PHPSESSID", '', time() - 3600, $params['path'], $params['domain']);
    }
}
