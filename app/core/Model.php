<?php

namespace App\core;

use PDO;

abstract class Model
{
    private static $link;

    public function __construct()
    {
        $config = require_once(dirname(__DIR__) . '/config/config.php');

        foreach ($config as $key => $value){
            $$key = $value;
        }

        self::$link = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $username, $password);
    }

    public static function first(string $table, string $where = '')
    {
        if ($where != ''){
            $where = 'WHERE ' . $where;
        }
        $query = "SELECT * FROM ${$table} ${$where}";
        return self::$link->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    public static function all(string $table, string $where = '')
    {
        if ($where != ''){
            $where = 'WHERE ' . $where;
        }
        $query = "SELECT * FROM ${$table} ${$where}";
        return self::$link->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(array $data, string $table)
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(", :", array_keys($data));

        debug(App::$app->link);

        $state = self::$link->prepare("INSERT INTO {$table} ({$fields}) VALUES ({$values})");
        $state->execute($data);

        return self::$link->lastInsertId();
    }

    public static function update(string $id, array $data, string $table)
    {
        $query = '';

        foreach ($data as $key => $value) {
            $query .= '' . $key . ' = :' . $key . ',';
        }

        $query = rtrim($query, ',');

        $sql = "UPDATE ${$table} SET ${$query} WHERE id=${$id}";

        $state = self::$link->prepare($sql);
        $state->execute($data);
    }


}