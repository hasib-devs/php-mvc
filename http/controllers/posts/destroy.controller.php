<?php

use Core\App;
use Core\Database;
use Core\Router;

$id = $_POST['id'];

$db = App::resolve(Database::class);

$post = $db->query(
    "SELECT * FROM posts WHERE id = :id",
    ['id' => $id]
)->findOrFail();

$db->query("DELETE FROM posts WHERE id = :id", [
    'id' => $id,
]);

Router::redirect('/posts');
