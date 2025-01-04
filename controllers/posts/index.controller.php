<?php

use Core\Database;

$pageTitle = "Blog Posts";
$config = require base_path('config.php');
$db = new Database($config['database']);
$posts = $db->query("select * from posts")->findAll();

view('posts/index', [
    'pageTitle' => $pageTitle,
    'posts' => $posts
]);
