<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

$container = new Container();

$container->bind(Database::class, function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);

$router = new Router();

require base_path("http/routes/index.php");

$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($currentUri, $requestMethod);
} catch (ValidationException $exception) {
    Session::flash("errors", $exception->errors);
    Session::flash("old", $exception->old);

    Router::back();
}

Session::unflash();
