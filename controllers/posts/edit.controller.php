<?php

use Core\App;
use Core\Database;
use Core\Router;

$pageTitle = "Edit Post";

$id = $_GET["id"];

if (empty($id)) {
    Router::redirect("/posts");
}

$db = App::resolve(Database::class);

$users = $db->query("select id, name from users")->findAll();
$post = $db->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

view('posts/edit', [
    'pageTitle' => $pageTitle,
    'users' => $users,
]);
