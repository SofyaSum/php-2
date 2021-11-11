<?php

class product 
{
  public $title;
  public $price;

  function __construct($title, $price) {
    $this->title = $title;
    $this->price = $price;
  }

  function view() {
    echo '<p>$this->title<br>$this->price $</p>';
  }
}

class discountProd extends product 
{
  function discount() {
    $this->price *= 0.8;
  }
}

$prod = new product('Book', 7);
$prod->view();

$prod2 = new discountProd();
$prod2->view();

/*
#5
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();   //создаём экземпляр класса А
$a2 = new A();   //создаём ещё один экземпляр класса А
$a1->foo();      // 1 т.к. ++$x
$a2->foo();      // 2 тк ++$x, при том, что $x=1
$a1->foo();      // 3 тк $x=2
$a2->foo();      // 4 соответственно

#6
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();  // создаём экземпляр класса А
$b1 = new B();  // создаём экземпляр класса В
$a1->foo();     // 1 $x=1 в классе А
$b1->foo();     // 1 х=1 в классе В
$a1->foo();     // 2 х=2 в классе А
$b1->foo();     // 2 х=2 в классе В

#7 код идентичный предыдущему
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
*/
