<?php
$pageTitle = "Edit Post";

$id = $_GET["id"];

if (empty($id)) {
    redirect("/posts");
}

$config = require base_path('config.php');
$db = new Database($config['database']);

$users = $db->query("select id, name from users")->findAll();
$post = $db->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

view('posts/edit', [
    'pageTitle' => $pageTitle,
    'users' => $users,
]);
