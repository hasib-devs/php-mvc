<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$pageTitle = "Create New Post";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = sanitizeInput($_POST['title']);
    $content = sanitizeInput($_POST['content']);
    $user_id = $_POST['user_id'];
    $status = 'published';
    $slug = createSlug($title);
    if (!Validator::string($title)) {
        $errors['title'] = 'Title is required.';
    } else if (!Validator::string($title, 1, 255)) {
        $errors['title'] = "Title can't be more then 255 characters.";
    }

    if (!Validator::string($content)) {
        $errors['content'] = 'Content is required';
    } else if (!Validator::string($content, 1, 1000)) {
        $errors['content'] = "Post content can't be more then 1000 characters.";
    }

    if (empty($user_id)) {
        $errors['user_id'] = "Post must have a author.";
    } else if (filter_var($user_id, FILTER_VALIDATE_INT) === false) {
        $errors['user_id'] = "Author ID not valid";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO `posts` (`title`, `content`, `slug`, `status`, `user_id`) VALUES (:title, :content, :slug, :status, :user_id)", [
            "title" => $title,
            "content" => $content,
            "slug" => $slug,
            "status" => $status,
            "user_id" => $user_id,
        ]);

        redirect("/posts");
    }
}

$users = $db->query("select id, name from users")->findAll();

view('posts/create', [
    'pageTitle' => $pageTitle,
    'users' => $users,
    'errors' => $errors,
]);
