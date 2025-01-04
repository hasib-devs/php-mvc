<?php

namespace Core;

class Router
{
    public $routes = [];

    public function get(string $uri, string $controller)
    {
        $this->appendRoute($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller)
    {
        $this->appendRoute($uri, $controller, 'POST');
    }

    public function put(string $uri, string $controller)
    {
        $this->appendRoute($uri, $controller, 'PUT');
    }

    public function patch(string $uri, string $controller)
    {
        $this->appendRoute($uri, $controller, 'PATCH');
    }

    public function delete(string $uri, string $controller)
    {
        $this->appendRoute($uri, $controller, "DELETE");
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if (trim($route['uri']) === trim($uri) && strtoupper($route['method']) === strtoupper($method)) {
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

    public static function redirect(string $url, int $status = Response::OK)
    {
        http_response_code($status);
        header("Location: {$url}");
        exit();
    }

    private function appendRoute(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }
}
