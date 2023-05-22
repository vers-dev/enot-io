<?php
//
//namespace App\core;
//
//use PDO;
//
//abstract class Model
//{
//    private static $link;
//
//    abstract public function getTable(): string;
//
//    public function __construct()
//    {
//        $config = require_once(dirname(__DIR__) . '/config/config.php');
//
//        foreach ($config as $key => $value){
//            $$key = $value;
//        }
//
//        self::$link = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;", $username, $password);
//    }
//
//    public function first(string $where = '')
//    {
//        if ($where != ''){
//            $where = 'WHERE ' . $where;
//        }
//        $query = "SELECT * FROM {$this->getTable()} {$where}";
//        return self::$link->query($query)->fetch(PDO::FETCH_ASSOC);
//    }
//
//    public function all(string $where = '')
//    {
//        if ($where != ''){
//            $where = 'WHERE ' . $where;
//        }
//        $query = "SELECT * FROM {$this->getTable()} {$where}";
//        return self::$link->query($query)->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function create(array $data)
//    {
//        $fields = implode(', ', array_keys($data));
//        $values = ':' . implode(", :", array_keys($data));
//
//        $state = self::$link->prepare("INSERT INTO {$this->getTable()} ({$fields}) VALUES ({$values})");
//        $state->execute($data);
//
//        return self::$link->lastInsertId();
//    }
//
//    public function update(string $id, array $data)
//    {
//        $query = '';
//
//        foreach ($data as $key => $value) {
//            $query .= '' . $key . ' = :' . $key . ',';
//        }
//
//        $query = rtrim($query, ',');
//
//        $sql = "UPDATE {$this->getTable()} SET {$query} WHERE id={$id}";
//
//        $state = self::$link->prepare($sql);
//        $state->execute($data);
//    }
//
//
//}

namespace App\core;

abstract class Model
{
    abstract public function getTable(): string;

    static public function query()
    {
        return (new static);
    }

    public function create(array $data): int
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(", :", array_keys($data));

        $state = App::$app->database->getPdo()->prepare("INSERT INTO {$this->getTable()} ({$fields}) VALUES ({$values})");
        $state->execute($data);

        return App::$app->database->getPdo()->lastInsertId();
    }

    public function update(string|int $id, array $data)
    {
        $query = '';

        foreach ($data as $key => $value) {
            $query .= '' . $key . ' = :' . $key . ',';
        }

        $query = rtrim($query, ',');

        $sql = "UPDATE {$this->getTable()} SET {$query} WHERE id={$id}";

        $state = App::$app->database->getPdo()->prepare($sql);
        $state->execute($data);

        return $id;
    }
}