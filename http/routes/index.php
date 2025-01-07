<?php
$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/posts', 'posts/index');
$router->get('/post', 'posts/show');
$router->post('/posts/store', 'posts/store');
$router->patch('/posts/update', 'posts/update');
$router->get('/posts/create', 'posts/create');
$router->get('/posts/edit', 'posts/edit');
$router->get('/posts/edit', 'posts/edit');

$router->get('/register', 'registration/register');
$router->post('/register', 'registration/store');

$router->get('/login', 'login/login');
$router->post('/login', 'login/store');

$router->post('/signout', 'signout');

$router->delete('/posts', 'posts/destroy');
