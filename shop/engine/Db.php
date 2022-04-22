<?php

namespace app\engine;

class Db
{
    private $config = [
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
    ];

    public function queryOne($sql)
    {
        return $sql . ';<br>';
    }

    public function queryAll($sql)
    {
        return $sql . ';<br>';
    }
}
