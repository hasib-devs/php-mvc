<?php
$pageTitle = "Create New Post";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_POST['user_id'];
    $status = 'published';
    $slug = createSlug($title);

    $errors = [];
    if (strlen($title) === 0) {
        $errors['title'] = 'Title is required.';
    }
    if (strlen($title) > 255) {
        $errors['title'] = "Title can't be more then 255 characters.";
    }

    if (strlen($content) === 0) {
        $errors['content'] = 'Content is required';
    }

    if (strlen($content) > 1000) {
        $errors['content'] = "Post content can't be more then 1000 characters.";
    }

    if (empty($user_id)) {
        $errors['user_id'] = "Post must have a author.";
    }

    if (empty($errors)) {
        $GLOBALS['db']->query("INSERT INTO `posts` (`title`, `content`, `slug`, `status`, `user_id`) VALUES (:title, :content, :slug, :status, :user_id)", [
            "title" => $title,
            "content" => $content,
            "slug" => $slug,
            "status" => $status,
            "user_id" => $user_id,
        ]);

        redirect("/posts");
    }
}

$users = $GLOBALS['db']->query("select id, name from users")->findAll();

require view('create-post');
