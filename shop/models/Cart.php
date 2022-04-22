<?php

namespace app\models;

class Cart extends Model
{
    public $id;
    public $products;

    protected function getTableName()
    {
        return 'cart';
    }
}
