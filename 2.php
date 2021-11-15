<?php

abstract class Product 
{
	protected static $price = 10;
	abstract public function getPrice();
}

class DigitalProduct extends Product 
{
	public function getPrice() 
  {
		return self::$price/2;
	}
}

class PhysProduct extends Product 
{
	public function getPrice() 
  {
		return self::$price;
	}
}

class WeightProduct extends Product 
{
	private $count;

	public function __construct() 
  {
		$this->count = 0;
	}

	public function setCount($count) 
  {
		$this->count = $count;
	}

	public function getCount($count) 
  {
		$this->count = $count;
	}

	public function getPrice() 
  {
		return $this->count * self::$price;
	}
}

$prod1 = new DigitalProduct();
$prod2 = new PhysProduct();
$prod3 = new WeightProduct();

$prod3->setCount(5);

echo 'Стоимость цифрового товара' . $prod1->getPrice() . '<br/>';
echo 'Стоимость штучного товара' . $prod2->getPrice() . '<br/>';
echo 'Стоимость весового товара' . $prod3->getPrice() . '<br/>';