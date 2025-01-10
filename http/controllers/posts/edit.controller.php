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

$users = $db->query("SELECT id, name FROM users")->findAll();
$post = $db->query(
    "SELECT * FROM posts WHERE id = :id",
    ['id' => $id]
)->findOrFail();

view('posts/edit', [
    'pageTitle' => $pageTitle,
    'users' => $users,
    'post' => $post,
]);
