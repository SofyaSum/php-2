<?php

use app\engine\Autoload;
use app\models\{Product, User};

include dirname(__DIR__) . '\engine\Autoload.php';
include dirname(__DIR__) . '\config\config.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product("Пицца", "Описание", 125);
//$product = $product->insert();
var_dump($product);

$user = new User('user', 'qwerty');
//$user = $user->insert();
var_dump($user);