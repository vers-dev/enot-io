<?php

namespace App\models;

use App\core\Model;

class Currency extends Model
{

    public function getTable(): string
    {
        return 'currencies';
    }
}