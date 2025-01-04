<?php
$routes = require base_path('Core/routes.php');

function routeToController(array $routes): void
{
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (array_key_exists($currentPath, $routes)) {
        require $routes[$currentPath];
    } else {
        abort(Response::NOT_FOUND);
    }
}

routeToController($routes);
