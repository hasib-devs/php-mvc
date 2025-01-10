<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


view('posts/create', [
    'pageTitle' => "Create New Post",
]);
