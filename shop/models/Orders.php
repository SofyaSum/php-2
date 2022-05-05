<?php

namespace app\models;

class Order extends DBModel
{
    public $id;
    public $name;
    public $phone;
    public $address;
    public $session_id;

    protected function getTableName()
    {
        return 'orders';
    }
}
