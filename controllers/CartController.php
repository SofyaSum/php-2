<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller
{
  public function actionIndex()
  {
    $cart = (new Cart())->getCart();
    echo $this->render('cart', [
      'cart' => $cart
    ]);
  }
}