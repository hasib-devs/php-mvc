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
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

$author = $db->query("select * from users where id = :id", ['id' => $post['user_id']])->find();
$post['author'] = $author;

// $user_id = 4;
// authorize($user_id === $post['user_id']);

$pageTitle = $post['title'];

view('posts/show', [
    'pageTitle' => $pageTitle,
    'post' => $post,
]);
