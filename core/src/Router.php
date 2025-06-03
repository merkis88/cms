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
        $uri = str_replace('/public', '', $uri);

        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);
        $action = $this->routes[$method][$path] ?? null;

        if (!$action) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        if (is_callable($action)) {
            // если передана анонимная функция (Closure)
            echo call_user_func($action);
            return;
        }

        // если передан массив: [Controller::class, 'method']
        [$class, $method] = $action;
        echo (new $class)->$method();
    }

}
