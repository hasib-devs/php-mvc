<?php
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die(1);
}
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function abort(int $status = Response::NOT_FOUND): void
{
    http_response_code($status);
    view($status);
    die();
}

function getController(string $value): string
{
    return base_path("controllers/{$value}.controller.php");
}

function view(string $value, array $attributes = []): void
{
    extract($attributes);
    require base_path("views/{$value}.view.php");
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
