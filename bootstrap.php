<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Router;

session_start();

$container = new Container();

$container->bind(Database::class, function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);

$router = new Router();

require base_path("web/routes.php");

$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($currentUri, $requestMethod);
