<?php
$routes = require base_path('routes.php');

function routeToController(array $routes): void
{
    $currentPath = $GLOBALS['currentPath'];

    if (array_key_exists($currentPath, $routes)) {
        require $routes[$currentPath];
    } else {
        abort(Response::NOT_FOUND);
    }
}

routeToController($routes);
