<?php
$userName =  $_SESSION['user']['name'] ?? "Guest";
$pageTitle = "Hello, {$userName}";

view('home', [
    'pageTitle' => $pageTitle,
]);
