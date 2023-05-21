<?php

namespace App\core;

class Router
{
    protected Request $request;
    protected array $routes;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = [];
    }

    public function get(string $path, \Closure|string|array $callback)
    {
        $this->routes["GET"][$path] = $callback;
    }

    public function post(string $path, \Closure|array $callback)
    {
        $this->routes["POST"][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        if (!array_key_exists($method, $this->routes)) {
            self::page_not_found();
            http_response_code(404);
            die();
        }
        if (!array_key_exists($path, $this->routes[$method])) {
            self::page_not_found();
            http_response_code(404);
            die();
        }

        $callback = $this->routes[$method][$path];

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->routes);
    }

    private static function page_not_found() {
        require_once dirname(__DIR__) . '/views/pages/404.view.php';
    }

    public static function redirect($path = '/'){
        header("Location: $path");
    }
}