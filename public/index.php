<?php

use App\core\App;

require_once (dirname(__DIR__) . "/vendor/autoload.php");
require(dirname(__DIR__) . "/app/lib/Dev.php");

session_start();

$app = new App();

require_once(dirname(__DIR__) . "/app/config/web.php");

$app->boot();


