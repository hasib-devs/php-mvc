<?php

use Core\App;
use Core\Database;

$pageTitle = "Blog Posts";
$db = App::resolve(Database::class);
$posts = $db->query("SELECT * FROM posts")->findAll();

view('posts/index', [
    'pageTitle' => $pageTitle,
    'posts' => $posts
]);
