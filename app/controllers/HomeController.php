<?php

namespace App\controllers;

use App\core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('pages/index');
    }

    public function login()
    {
        return $this->render('auth/login');
    }

    public function registration()
    {
        $data = [
            'name' => 'Енот'
        ];
        return $this->render('auth/registration', $data);

    }
}