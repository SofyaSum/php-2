<?php

use app\engine\Autoload;
use app\models\{Product, User};

include dirname(__DIR__) . '\engine\Autoload.php';
include dirname(__DIR__) . '\config\config.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
  $controller = new $controllerClass();
  $controller->runAction($actionName);
} else {
  die('Нет такого контроллера');
}

die();

$product = new Product("Пицца", "Описание", 125);

$user = (new User())->getOne(1);
$user->pass = 321;
var_dump($user);
$user->save();