<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

$users = $db->query("select id, name from users")->findAll();

view('posts/create', [
    'pageTitle' => "Create New Post",
    'users' => $users,
    'errors' => $errors,
]);
