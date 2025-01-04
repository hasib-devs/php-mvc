<?php
const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'utils/functions.php';
require base_path('Database.php');
require base_path('utils/Response.php');

$pageTitle = "Basic PHP";
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$config = require base_path('utils/config.php');
$db = new Database($config['database']);


$routes = require base_path('routes.php');
routeToController($currentPath, $routes);
