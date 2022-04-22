<?php

use app\engine\{Autoload, Db};
use app\models\{Product, User, Cart, Image, Order};

include '../engine/Autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

$product = new Product($db);

$product->name = 123;

echo $product->name;

$user = new User($db);
$order = new Order($db);
$cart = new Cart($db);

echo $user->getAll();
echo $product->getOne(5);
echo $order->getOne(7);
echo $cart->getOne(1);
