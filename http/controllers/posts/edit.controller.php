<?php

use Core\App;
use Core\Database;
use Core\Router;

$pageTitle = "Update Post";

$id = $_GET["id"];

if (empty($id)) {
    Router::redirect("/posts");
}

$db = App::resolve(Database::class);

$post = $db->query(
    "SELECT * FROM posts WHERE id = :id",
    ['id' => $id]
)->findOrFail();

view('posts/edit', [
    'pageTitle' => $pageTitle,
    'post' => $post,
]);
