<?php

class Autoload
{
    private $path = ['models', 'engine'];

    public function loadClass($className)
    {
        foreach ($this->path as $path) {
            $fileName = "../$path/$className.php";
            if (file_exists($fileName)) {
                include $fileName;
                var_dump($fileName);
                break;
            }
        }
        include "../models/$className.php";
    }
}
