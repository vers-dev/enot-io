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

    public function post(string $path, \Closure|string|array $callback)
    {
        $this->routes["POST"][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();


        if (!array_key_exists($method, $this->routes)) {
            echo "Метод {$method} не существует в маршрутах";
            http_response_code(404);
            die();
        }
        if (!array_key_exists($path, $this->routes[$method])) {
            echo "Путь {$path} не найден в {$method} маршрутах";
            http_response_code(404);
            die();
        }

        $callback = $this->routes[$method][$path];

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->routes);
    }

    public function renderView(string $view, array $data = [])
    {

    }


}