<?php

//use app\models\{Product, User};
//use app\engine\Db;

include '../engine/Autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product();
$user = new User();
$db = new Db();

var_dump($product);
var_dump($user);
var_dump($db);
