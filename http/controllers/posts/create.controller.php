<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$users = $db->query("SELECT id, name FROM users")->findAll();

view('posts/create', [
    'pageTitle' => "Create New Post",
    'users' => $users,
]);
