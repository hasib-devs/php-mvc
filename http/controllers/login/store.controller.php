<?php

namespace Http\Controllers\Login;

use Core\App;
use Core\Database;
use Core\Router;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);
$user = $db->query("SELECT id, name, email, password FROM users WHERE email = :email", ['email' => $email])->find();
$form = new LoginForm();

if (! $form->validate($email, $password, $user)) {
    view('login/login', [
        'pageTitle' => "Login to your account",
        'errors' => $form->errors(),
    ]);

    exit();
}

login($user);

Router::redirect('/');
