<?php

namespace App\core;

abstract class Model
{
    private string $table;

    public function __construct(string $table)
    {
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function setTable(string $table){
        $this->table = $table;
    }

}