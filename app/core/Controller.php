<?php

namespace App\core;

use Rakit\Validation\Validator;

abstract class Controller
{
    public object $view;
    public object $request;
    public object $validator;
    public object $rb;

    public function __construct()
    {
        $this->view = new View();
        $this->request = new Request();
        $this->validator = new Validator();
    }

    public function render(string $view, array $data = [])
    {
        return $this->view->renderView($view, $data);
    }
}