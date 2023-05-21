<?php

namespace App\core;

abstract class Controller
{
    public string $route;
    public object $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $view, array $data = []): string
    {
        return $this->view->renderView($view, $data);
    }
}