<?php

use Core\Router;

if ($_SESSION['user'] ?? false) {
    Router::redirect('/');
}

view('login/login', [
    'pageTitle' => "Login to your account",
]);
