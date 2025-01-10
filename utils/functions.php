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

function controller(string $value): string
{
    return base_path("Http/Controllers/{$value}.controller.php");
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

function sanitizeInput(string $string): string
{
    return htmlspecialchars(preg_replace('/\s+/', ' ', trim($string)));
}

function login(array $user)
{
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    $params = session_get_cookie_params();

    session_destroy();
    setcookie("PHPSESSID", '', time() - 3600, $params['path'], $params['domain']);
}
