<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        $array = $this->props;

        if (array_key_exists($name, $array)) {
            $this->props[$name] = true;
            $this->$name = $value;
        } else {
            echo 'Нет такого поля';
        }
        
    }

    public function __get($name)
    {
        $array = $this->props;

        if (array_key_exists($name, $array)) {
            return $this->$name;
        } else {
            echo 'Нет такого поля';
        }
    }

    public function __isset($name)
    {
        return true;
    }
}
