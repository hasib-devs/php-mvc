<?php

$id = $_GET["id"];

if (empty($id)) {
    redirect("/posts");
}

$user_id = 4;


$post = $GLOBALS['db']->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

// authorize($user_id === $post['user_id']);

$pageTitle = $post['title'];

require view('posts/show');
