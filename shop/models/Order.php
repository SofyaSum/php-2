<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $name;
    public $phone;
    public $address;

    protected function getTableName()
    {
        return 'orders';
    }
}
