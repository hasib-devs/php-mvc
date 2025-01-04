<?php
$pageTitle = "Blog Posts";

$posts = $GLOBALS['db']->query("select * from posts")->findAll();

view('posts/index', [
    'pageTitle' => $pageTitle,
    'posts' => $posts
]);
