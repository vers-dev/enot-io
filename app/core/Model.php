<?php
namespace App\core;

use PDO;

abstract class Model
{
    abstract public function getTable(): string;

    static public function query(): static
    {
        return (new static);
    }

    public function first(string $where = ''): array
    {
        $data = $this->all($where);

        if (count($data)){
            return $data[0];
        }

        return [];
    }

    public function all(string $where = ''): bool|array
    {
        if ($where != ''){
            $where = 'WHERE ' . $where;
        }

        $query = "SELECT * FROM {$this->getTable()} {$where}";
        return $this->db()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): int
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(", :", array_keys($data));

        $state = App::$app->database->getPdo()->prepare("INSERT INTO {$this->getTable()} ({$fields}) VALUES ({$values})");
        $state->execute($data);

        return App::$app->database->getPdo()->lastInsertId();
    }

    public function update(string|int $id, array $data): int|string
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

    private function db(){
        return App::$app->database->getPdo();
    }
}