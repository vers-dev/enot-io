<?php

namespace App\core;

abstract class Model
{
    private string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function getTable(): string
    {
        return $this->table;
    }

}