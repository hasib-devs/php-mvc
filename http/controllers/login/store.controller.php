<?php

namespace Http\Controllers\Login;

use Core\Authenticator;
use Core\Router;

$email = $_POST['email'];
$password = $_POST['password'];
$form = new LoginForm();

if (! $form->validate($email, $password)) {
    view('login/login', [
        'pageTitle' => "Login to your account",
        'errors' => $form->errors(),
    ]);

    exit();
}

$auth = new Authenticator();

$user = $auth->attempt($email, $password);

if (!$user) {
    view('login/login', [
        'pageTitle' => "Login to your account",
        'errors' => [
            'password' => "Invalid Email or Password"
        ],
    ]);

    exit();
}

Router::redirect('/');
