<?php
return [
    '/' => getController('home'),
    '/about' => getController('about'),
    '/posts' => getController('posts/index'),
    '/post' => getController('posts/show'),
    '/posts/create' => getController('posts/create'),
    '/posts/edit' => getController('posts/edit'),
];
