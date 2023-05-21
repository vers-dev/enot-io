<?php

namespace App\lib\querybuilder;

class Insert
{
    private string $table;

    private array $columns = [];

    private array $values = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString()
    {
        return 'INSERT INTO ' . $this->table . ' (' . implode(', ', $this->columns) . ') VALUES (' . implode(', ', $this->values) . ')';
    }

    public function columns(string ...$columns) {
        $this->columns = $columns;
        foreach ($columns as $column){
            $this->values[] = ":$column";
        }
        return $this;
    }

}