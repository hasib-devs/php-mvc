<?php
$pageTitle = "Create New Post";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_POST['user_id'];
    $status = 'published';
    $slug = createSlug($title);

    $GLOBALS['db']->query("INSERT INTO `posts` (`title`, `content`, `slug`, `status`, `user_id`) VALUES (:title, :content, :slug, :status, :user_id)", [
        "title" => $title,
        "content" => $content,
        "slug" => $slug,
        "status" => $status,
        "user_id" => $user_id,
    ]);
}

$users = $GLOBALS['db']->query("select id, name from users")->findAll();

require view('create-post');
