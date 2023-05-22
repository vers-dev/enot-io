<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Currency;

class HomeController extends Controller
{
    public function index()
    {
        $currencies = Currency::query()->all();
        return $this->render('pages/index', ['currencies' => $currencies]);
    }

    public function login()
    {
        return $this->render('auth/login');
    }

    public function registration()
    {
        return $this->render('auth/registration');

    }
}