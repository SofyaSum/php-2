<?php

namespace app\models;

use app\engine\Db;

class User extends Model
{
    public $id;
    public $login;
    public $pass;

    protected function getTableName()
    {
        return 'users';
    }
}
