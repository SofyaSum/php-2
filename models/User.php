<?php

namespace app\models;

class User extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    //User::Auth();
    public static function Auth($login, $pass) 
    {

    }

    public static function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    protected function getTableName()
    {
        return 'users';
    }
}
