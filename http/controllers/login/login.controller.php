<?php

namespace Http\Controllers\Login;

use Core\Router;
use Core\Session;

if ($_SESSION['user'] ?? false) {
    Router::redirect('/');
}

view('login/login', [
    'pageTitle' => "Login to your account",
    'errors' => Session::get('errors') ?? [],
]);
