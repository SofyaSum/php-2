<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
  abstract protected function getTableName();

  //SELECT from users where login = admin
  public static function getWhere($name, $value)
  {
    //TODO: собрать запрос вида WHERE 'login' = 'admin'
  }

  public function insert()
  {
    $array = get_object_vars($this);

    if (array_key_exists('id', $array)) {
      unset($array['id']);
    }

    $columns = array_keys($array);

    $func = function ($var) {
      return ':' . $var;
    };

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

  public function update()
  {
    $params = [];
    $columns = [];

    $tableName = $this->getTableName();

    foreach ($this->props as $key => $value) {
      if (!$value) continue;
      $params["{$key}"] = $this->$key;
      $columns[] .= "'{$key}' = :{$key}";
      $this->props[$key] = false;
    }
    $columns = implode(", ", $columns);
    $params['id'] = $this->id;

    $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
    Db::getInstance()->execute($sql, $params);
    return $this;
  }

  public function save()
  {
    if (is_null($this->id)) {
      $this->insert();
    } else {
      $this->update();
    }
  }

  public function delete()
  {
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

  public function getLimit($limit)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
    return Db::getInstance()->queryLimit($sql, $limit);
  }

  public function getAll()
  {
    $sql = "SELECT * FROM {$this->getTableName()}";
    return Db::getInstance()->queryAll($sql);
  }
}