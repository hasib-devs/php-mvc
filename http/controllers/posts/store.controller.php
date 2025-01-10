<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Router;

$db = App::resolve(Database::class);

$title = sanitizeInput($_POST['title']);
$content = sanitizeInput($_POST['content']);
$status = 'published';
$slug = createSlug($title);
$errors = [];

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


if (!empty($errors)) {
    $users = $db->query("SELECT id, name FROM users")->findAll();
    view('posts/create', [
        'pageTitle' => "Create New Post",
        'users' => $users,
        'errors' => $errors,
    ]);
    exit();
}

$db->query("INSERT INTO posts (title, content, slug, status, user_id) VALUES (:title, :content, :slug, :status, :user_id)", [
    "title" => $title,
    "content" => $content,
    "slug" => $slug,
    "status" => $status,
    "user_id" => $_SESSION['user']['id'],
]);

Router::redirect("/posts");
