<?php

namespace App\lib\querybuilder;

class QueryBuilder
{
    public function select(string $select)
    {
        return new Select($select);
    }

    public function insert(string $into){
        return new Insert($into);
    }
}