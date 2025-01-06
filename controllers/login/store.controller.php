<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::email($email)) {
    $errors['email'] = "Email is required";
}

if (!Validator::string($password)) {
    $errors['password'] = "Password is required";
}

$user = $db->query("SELECT name, email, password FROM users WHERE email = :email", ['email' => $email])->find();
if ($user) {
    if ($user['password'] !== $password) {
        $errors['password'] = "Password doesn't match";
    }
} else {
    $errors['email'] = "Invalid email address";
}

if (!empty($errors)) {
    view('login/login', [
        'pageTitle' => "Login to your account",
        'errors' => $errors,
    ]);

    exit();
}


$_SESSION['user'] = [
    'name' => $user['name'],
    'email' => $user['email'],
];

Router::redirect('/');
