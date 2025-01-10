<?php

use Core\AuthType;

$router->get('/', 'home');
$router->get('/about', 'about');

$router->get('/posts', 'posts/index')->only("auth");
$router->get('/post', 'posts/show')->only("auth");
$router->post('/posts/store', 'posts/store')->only("auth");
$router->patch('/posts/update', 'posts/update')->only("auth");
$router->get('/posts/create', 'posts/create')->only("auth");
$router->get('/posts/edit', 'posts/edit')->only("auth");
$router->get('/posts/edit', 'posts/edit')->only("auth");
$router->delete('/posts', 'posts/destroy')->only("auth");

$router->get('/register', 'registration/register')->only("guest");
$router->post('/register', 'registration/store')->only("guest");

$router->get('/login', 'login/login')->only("guest");
$router->post('/login', 'login/store')->only("guest");

$router->post('/signout', 'signout')->only("auth");
