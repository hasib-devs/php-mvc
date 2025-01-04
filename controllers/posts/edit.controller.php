<?php
$pageTitle = "Edit Post";

$id = $_GET["id"];

if (empty($id)) {
    redirect("/posts");
}

$users = $GLOBALS['db']->query("select id, name from users")->findAll();
$post = $GLOBALS['db']->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

view('posts/edit', [
    'pageTitle' => $pageTitle,
    'users' => $users,
]);
