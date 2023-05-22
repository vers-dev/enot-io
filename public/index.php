<?php

use App\core\App;
use App\models\User;

require_once (dirname(__DIR__) . "/vendor/autoload.php");
require(dirname(__DIR__) . "/app/lib/Dev.php");

$app = new App();

require_once(dirname(__DIR__) . "/app/config/web.php");

$app->boot();

//User::query()->create([
//    'login' => 'avavionmvm',
//    'password' => 'avavionmvm',
//]);

User::query()->update(1, [
    'login' => 'avavion'
]);