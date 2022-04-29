<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        return $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function insert()
    {
        $array = get_object_vars($this);

        if (array_key_exists('id', $array))
        {
            unset($array['id']);
        }

        $columns = array_keys($array);

        $func = function($var){return ':'.$var;};

        $newKeys = array_map($func, $columns);

        $params = array_combine($newKeys, $array);

        $columns = implode(', ', $columns);
        $values = implode(', ', $newKeys);

        $tableName = $this->getTableName();

        $sql = "INSERT INTO `$tableName` ($columns) VALUES ($values)";
        
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }
    //TODO: написать функцию update()
//    public function update() {
//        $sql = "UPDATE `products` SET `name` = :name, `description` = :description, `price` = :price WHERE id = :id";
//    }

    public function delete() {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]); 
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        //return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance() ->queryAll($sql);
    }

    abstract protected function getTableName();
}
