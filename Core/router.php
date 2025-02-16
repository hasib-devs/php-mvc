<?php

namespace Core;

use Core\Middleware\Middleware;


class Router
{
    public $routes = [];

    public function get(string $uri, string $controller)
    {
        return $this->append($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller)
    {
        return $this->append($uri, $controller, 'POST');
    }

    public function put(string $uri, string $controller)
    {
        return $this->append($uri, $controller, 'PUT');
    }

    public function patch(string $uri, string $controller)
    {
        return $this->append($uri, $controller, 'PATCH');
    }

    public function delete(string $uri, string $controller)
    {
        return $this->append($uri, $controller, "DELETE");
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if (trim($route['uri']) === trim($uri) && strtoupper($route['method']) === strtoupper($method)) {
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }

                return require $route['controller'];
            }
        }

        $this->abort();
    }

    public static function abort(int $status = Response::NOT_FOUND): void
    {
        http_response_code($status);
        view($status);
        die();
    }

    public static function redirect(string $uri, int $status = Response::OK)
    {
        http_response_code($status);
        header("Location: {$uri}");
        exit();
    }

    public static function back()
    {
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: {$uri}");
        exit();
    }

    private function append(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => controller($controller),
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function only(string $key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
}
