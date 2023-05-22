<?php

namespace App\core;

use PDO;

final class App
{
    public Router $router;

    public Session $session;

    public static App $app;
    public static $link;


    public function __construct()
    {
        $this->router = new Router();
        $this->session = new Session();
        self::$app = $this;

        $config = require_once(dirname(__DIR__) . '/config/config.php');

        foreach ($config as $key => $value){
            $$key = $value;
        }

        self::$link = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $username, $password);
    }

    public static function boot(): void
    {
        echo self::$app->router->resolve();
        self::libs();
    }

    public static function libs(): void
    {
        $config = require_once(dirname(__DIR__) . '/config/libs.php');

        foreach ($config['libs'] as $lib) {
            require_once(dirname(__DIR__) . "/lib/$lib.php");
        }
    }
}