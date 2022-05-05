<?php

namespace app\models;

class Cart extends DBModel
{
    protected $id;
    protected $products_id;
    protected $session_id;

    protected $props = [
        'products_id' => false,
        'session_id' => false
    ];

    public static function getCart() {
        return [];
    }

    protected function getTableName()
    {
        return 'cart';
    }
}
