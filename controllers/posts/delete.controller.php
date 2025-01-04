<?php
use Core\Database;
use Core\Router;

$id = $_POST['id'];

$config = require base_path('config.php');
$db = new Database($config['database']);

$post = $db->query(
    "select * from posts where id = :id",
    ['id' => $id]
)->findOrFail();

$db->query("DELETE FROM posts WHERE id = :id", [
    'id' => $id,
]);

Router::redirect('/posts');