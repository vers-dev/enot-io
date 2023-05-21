<?php

use App\controllers\HomeController;
use App\controllers\UserController;
use App\core\App;

$router = App::$app->router;

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [HomeController::class, 'login']);
$router->get('/registration', [HomeController::class, 'registration']);
$router->get('/profile', [UserController::class, 'profile']);
