<?php

namespace App\lib;

class QueryBuilder
{
    private array $fields = [];
    private array $conditions = [];
    private array $from = [];

    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);
        return 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(',', $this->from) . $where;
    }

    public function select(string ...$select) {
        $this->fields = $select;

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