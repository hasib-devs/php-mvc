<?php
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die(1);
}

function abort(int $code = Response::NOT_FOUND): void
{
    http_response_code($code);
    require getcwd() . "/views/{$code}.php";
    die();
}

function getController(string $value): string
{
    return getcwd() . "/controllers/{$value}.controller.php";
}

function view(string $value): string
{
    return getcwd() . "/views/{$value}.view.php";
}

function routeToController(string $currentPath, array $routes): void
{
    if (array_key_exists($currentPath, $routes)) {
        require $routes[$currentPath];
    } else {
        abort(Response::NOT_FOUND);
    }
}

function logger(string $value): void
{
    echo "{$value} </br>";
}

function authorize(bool $condition, int $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}
