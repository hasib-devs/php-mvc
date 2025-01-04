<?php
const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'utils/functions.php';

spl_autoload_register(function ($class) {
    // Core\Database
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$result}.php");
});

$router = new Core\Router();

require base_path("routes.php");

$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->route($currentUri, $requestMethod);
