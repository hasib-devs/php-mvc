<?php

use Core\AuthType;

$router->get('/', 'home');
$router->get('/about', 'about');

$router->get('/posts', 'Posts/index')->only("auth");
$router->get('/post', 'Posts/show')->only("auth");
$router->post('/posts/store', 'Posts/store')->only("auth");
$router->patch('/posts/update', 'Posts/update')->only("auth");
$router->get('/posts/create', 'Posts/create')->only("auth");
$router->get('/posts/edit', 'Posts/edit')->only("auth");
$router->get('/posts/edit', 'Posts/edit')->only("auth");
$router->delete('/posts', 'Posts/destroy')->only("auth");

$router->get('/register', 'Registration/register')->only("guest");
$router->post('/register', 'Registration/store')->only("guest");

$router->get('/login', 'Login/login')->only("guest");
$router->post('/login', 'Login/store')->only("guest");

$router->post('/signout', 'signout')->only("auth");
