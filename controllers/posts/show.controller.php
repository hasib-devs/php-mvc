<?php

use Core\Database;
use Core\Router;

$id = $_GET["id"];

if (empty($id)) {
    Router::redirect("/posts");
}

$config = require base_path('config.php');
$db = new Database($config['database']);

$post = $db->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

// $user_id = 4;
// authorize($user_id === $post['user_id']);

$pageTitle = $post['title'];

view('posts/show', [
    'pageTitle' => $pageTitle,
    'post' => $post,
]);
