<?php

namespace app\models;

class Image extends Model
{
    public $id;
    public $fileName;
    public $path;
    public $size;

    protected function getTableName()
    {
        return 'images';
    }
}
