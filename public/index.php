<?php

use App\core\App;
use App\models\User;

require_once (dirname(__DIR__) . "/vendor/autoload.php");
require(dirname(__DIR__) . "/app/lib/Dev.php");

$app = new App();

require_once(dirname(__DIR__) . "/app/config/web.php");

$app->boot();

//debug($_SESSION['errors']);