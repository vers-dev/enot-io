<?php

namespace App\core;

final class App
{
    public Router $router;
    public Session $session;
    public Database $database;

    public static App $app;

    public function __construct()
    {
        $this->router = new Router();
        $this->session = new Session();
        $this->database = new Database();

        self::$app = $this;
    }
    public function boot(): void
    {
//        $this->libs();
        $this->router->resolve();
    }

    public function libs(): void
    {
        $config = require_once(dirname(__DIR__) . '/config/libs.php');

        foreach ($config['libs'] as $lib) {
            require_once(dirname(__DIR__) . "/lib/$lib.php");
        }
    }
}