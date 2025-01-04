<?php
return [
    '/' => getController('home'),
    '/about' => getController('about'),
    '/posts' => getController('posts'),
    '/post' => getController('post'),
    '/posts/create' => getController('create-post'),
    '/posts/edit' => getController('edit-post'),
];
