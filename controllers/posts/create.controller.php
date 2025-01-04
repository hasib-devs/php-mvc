<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$users = $db->query("select id, name from users")->findAll();

view('posts/create', [
    'pageTitle' => "Create New Post",
    'users' => $users,
]);
