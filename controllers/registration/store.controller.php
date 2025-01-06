<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\Validator;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($name, 2, 100)) {
    $errors['name'] = "Name should be in between 2-100 characters long.";
}

if (!Validator::email($email)) {
    $errors['email'] = "Invalid Email Address.";
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = "Password should be in between 6-255 characters long.";
}

if (!empty($errors)) {
    view('registration/register', [
        'pageTitle' => "Register New Account",
        'errors' => $errors,
    ]);

    exit();
}

$db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", [
    'name' => $name,
    'email' => $email,
    'password' => $password,
]);

$_SESSION['user'] = [
    'name' => $name,
    'email' => $email,
];

Router::redirect('/');
