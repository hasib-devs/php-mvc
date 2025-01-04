<?php
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die(1);
}

function abort(int $status = Response::NOT_FOUND): void
{
    http_response_code($status);
    require getcwd() . "/views/{$status}.php";
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

function createSlug($title)
{
    // Convert to lowercase
    $slug = strtolower($title);

    // Replace non-alphanumeric characters with hyphens
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

    // Trim leading/trailing hyphens
    $slug = trim($slug, '-');

    return $slug;
}

function redirect(string $url, int $status = Response::OK)
{
    http_response_code($status);
    header("Location: {$url}");
    exit();
}

function sanitizeInput(string $string): string
{

    // return htmlspecialchars(trim($string));
    return htmlspecialchars(preg_replace('/\s+/', ' ', trim($string)));
}
