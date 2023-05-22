<?php

namespace App\models;

use App\core\Model;

class User extends Model
{
    public function getTable(): string
    {
        return 'users';
    }
}