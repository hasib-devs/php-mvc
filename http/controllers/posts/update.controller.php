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
$post_id = $_POST['id'];

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
    view('posts/edit', [
        'pageTitle' => "Update Post",
        'users' => $users,
        'errors' => $errors,
    ]);
}

$db->query("UPDATE posts SET title = :title, content = :content, slug = :slug, status = :status WHERE id = :post_id", [
    "title" => $title,
    "content" => $content,
    "slug" => $slug,
    "status" => $status,
    "post_id" => $post_id,
]);

Router::redirect("/post?id=$post_id");
