<?php
$pageTitle = "Blog Posts";

$posts = $GLOBALS['db']->query("select * from posts")->findAll();

require view('posts');
