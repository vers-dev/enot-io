<?php

namespace App\core;

use PDO;

final class Database
{
    public PDO $pdo;

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function __construct()
    {
        try {
            $config = require_once(dirname(__DIR__) . '/config/config.php');

            foreach ($config as $key => $value)
            {
                $$key = $value;
            }

            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $username, $password);

            $this->getPdo()->exec("SET CHARSET utf8");
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

    }

}