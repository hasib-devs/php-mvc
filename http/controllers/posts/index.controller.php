<?php

use Core\App;
use Core\Database;

$pageTitle = "Blog Posts";
$db = App::resolve(Database::class);
$posts = $db->query("SELECT * FROM posts WHERE user_id = :user", ['user' => $_SESSION['user']['id']])->findAll();

view('posts/index', [
    'pageTitle' => $pageTitle,
    'posts' => $posts
]);
