<?php

namespace App\core;

use R;

final class App
{
    public Router $router;

    public Session $session;

    public static App $app;


    public function __construct()
    {
        $this->router = new Router();
        $this->session = new Session();
        self::$app = $this;
    }

    public static function boot(): void
    {
        echo self::$app->router->resolve();
        self::libs();
        self::db();
    }

    public static function libs()
    {
        $config = require_once(dirname(__DIR__) . '/config/libs.php');

        foreach ($config['libs'] as $lib) {
            require_once(dirname(__DIR__) . "/lib/$lib.php");
        }
    }

    public static function db()
    {
        $config = require_once(dirname(__DIR__) . '/config/config.php');


        R::setup('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8mb4;',
            $config['username'], $config['password']);

        if (!R::testConnection()) {
            die("Ошибка подключения к бд");
        }
    }
}