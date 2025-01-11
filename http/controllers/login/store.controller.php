<?php

namespace Http\Controllers\Login;

use Core\Authenticator;
use Core\Router;

$email = $_POST['email'];
$password = $_POST['password'];


$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);

$signedIn = (new Authenticator)->attempt($email, $password);

if (!$signedIn) {
    $form->error("password", "Invalid Email or Password")->throw();
}


Router::redirect('/');
