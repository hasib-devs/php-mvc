<?php

$router->get('/', getController('home'));
$router->get('/about', getController('about'));
$router->get('/posts', getController('posts/index'));
$router->get('/post', getController('posts/show'));
$router->get('/posts/create', getController('posts/create'));
$router->get('/posts/edit', getController('posts/edit'));


// return [
//     '/' => getController('home'),
//     '/about' => getController('about'),
//     '/posts' => getController('posts/index'),
//     '/post' => getController('posts/show'),
//     '/posts/create' => getController('posts/create'),
//     '/posts/edit' => getController('posts/edit'),
// ];
