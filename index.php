<?php

class Unit
{
    protected $name;
    protected $health;

    public function __construct($name = null, $health = null)
    {
        $this->name = $name;
        $this->health = $health;
    }

    public function info()
    {
        echo "Я $this->name, у меня $this->health жизней. <br>";
    }
}

class Warrior extends Unit
{
    private $damage;

    public function __construct($name = null, $health = null, $damage = null)
    {
        parent::__construct($name, $health);
        $this->damage = $damage;
    }

    public function attack($target)
    {
        $target->health -= $this->damage;
        echo "{$this->name} атаковал {$target->name}а и нанёс {$this->damage} урона.<br>";
        $target->info();
        echo '<br>';
    }

    public function info()
    {
        parent::info();
        echo "$this->name умеет атаковать на $this->damage поинтов.<br>";
    }
}

class Healer extends Unit
{
    private $recovery;

    public function __construct($name = null, $health = null, $recovery = null)
    {
        parent::__construct($name, $health);
        $this->recovery = $recovery;
    }

    public function heal($target)
    {
        $target->health += $this->recovery;
        echo "{$this->name} полечил {$target->name}а на {$this->recovery} здоровья. <br>";
        $target->info();
        echo '<br>';
    }

    public function info()
    {
        parent::info();
        echo "$this->name умеет лечить на $this->recovery поинтов. <br>";
    }
}

$monster = new Unit('монстр', 50);
$monster->info();

$player = new Warrior('Конан', 100, 20);
$player->info();

$healer = new Healer('Лекарь', 75, 15);
$healer->info();

$player->attack($monster);
$healer->heal($player);
