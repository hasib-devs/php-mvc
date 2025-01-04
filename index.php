<?php
require 'utils/functions.php';
require 'Database.php';
require 'routes.php';
require 'utils/Response.php';


$pageTitle = "Basic PHP";
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$config = require 'utils/config.php';

$db = new Database($config['database']);

routeToController($currentPath, $routes);
