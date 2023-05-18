<?php

namespace App\core;

final class App
{
    public Router $router;

    public static App $app;

    public function __construct()
    {
        $this->router = new Router();
        self::$app = $this;
    }

    static function boot():void
    {
        echo self::$app->router->resolve();
    }
}