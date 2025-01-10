<?php

namespace Http\Controllers\Login;

use Core\Authenticator;
use Core\Router;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];
$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        Router::redirect('/');
    }
    $form->error("password", "Invalid Email or Password");
}


Session::flash("errors", $form->errors());

Router::redirect("/login");
