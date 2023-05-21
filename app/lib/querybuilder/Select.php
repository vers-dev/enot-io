<?php

namespace App\lib\querybuilder;

class Select
{
    private array $fields = [];
    private array $conditions = [];
    private array $from = [];

    public function __construct(array $select) {
        $this->fields = $select;
    }

    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);
        return 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(',', $this->from) . $where;
    }

    public function select(string ...$select) {
        foreach ($select as $arg) {
            $this->fields[] = $arg;
        }
        return $this;
    }

    public function where(string ...$where){
        foreach ($where as $arg){
            $this->conditions[] = $arg;
        }

        return $this;
    }

    public function from(string $table) {
        $this->from[] = $table;

        return $this;
    }
}