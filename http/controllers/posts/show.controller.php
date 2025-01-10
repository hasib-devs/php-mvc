<?php

use Core\App;
use Core\Database;
use Core\Router;

$id = $_GET["id"];

if (empty($id)) {
    Router::redirect("/posts");
}

$db = App::resolve(Database::class);

$post = $db->query(
    "SELECT * FROM posts WHERE id = :id",
    ['id' => $id]
)->findOrFail();

$author = $db->query("SELECT id, name FROM users WHERE id = :id", ['id' => $post['user_id']])->find();
$post['author'] = $author;

$pageTitle = $post['title'];

view('posts/show', [
    'pageTitle' => $pageTitle,
    'post' => $post,
]);
