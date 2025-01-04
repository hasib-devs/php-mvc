<?php
$router->get('/', getController('home'));
$router->get('/about', getController('about'));
$router->get('/posts', getController('posts/index'));
$router->get('/post', getController('posts/show'));
$router->post('/posts/store', getController('posts/store'));
$router->patch('/posts/update', getController('posts/update'));
$router->get('/posts/create', getController('posts/create'));
$router->get('/posts/edit', getController('posts/edit'));

$router->delete('/posts', getController('posts/destroy'));
