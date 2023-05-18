<?php

use App\controllers\HomeController;
use App\core\App;

$router = App::$app->router;

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [HomeController::class, 'login']);
$router->get('/test', function () {
    return "test get function";
});
