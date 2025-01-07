<?php

namespace Core;

class Router
{
    public $routes = [];

    public function get(string $uri, string $controller)
    {
        $this->append($uri, $controller, 'GET');
        return $this;
    }

    public function post(string $uri, string $controller)
    {
        $this->append($uri, $controller, 'POST');
        return $this;
    }

    public function put(string $uri, string $controller)
    {
        $this->append($uri, $controller, 'PUT');
        return $this;
    }

    public function patch(string $uri, string $controller)
    {
        $this->append($uri, $controller, 'PATCH');
        return $this;
    }

    public function delete(string $uri, string $controller)
    {
        $this->append($uri, $controller, "DELETE");
        return $this;
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
            'controller' => getController($controller),
            'method' => $method,
        ];
    }
}
