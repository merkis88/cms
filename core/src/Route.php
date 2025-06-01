<?php

namespace Src;

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);
        $action = $this->routes[$method][$path] ?? null;

        if (!$action) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$class, $method] = $action;
        echo (new $class)->$method();
    }
}