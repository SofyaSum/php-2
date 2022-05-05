<?php

namespace app\controllers;

use app\models\Product;
use Collator;

class ProductController extends Controller
{
  public function actionIndex()
  {
    echo $this->render('index');
  }

  public function actionCart()
  {
    echo "Корзина";
  }

  public function actionCatalog()
  {
    $page = $_GET['page'] ?? 0;

    $catalog = (new Product())->getLimit(($page + 1) * 2);

    echo $this->render('product/catalog', [
      'catalog' => $catalog,
      'page' => ++$page
    ]);
  }

  public function actionCard()
  {
    $id = $_GET['id'];
    $product = (new Product())->getOne($id);

    echo $this->render('product/card', [
      'product' => $product
    ]); 
  }
}