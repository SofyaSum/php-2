<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        $path = ['\\', 'app\\'];
        $alter = [DS, ROOT . DS];

        $fileName = str_replace($path, $alter, $className) . '.php';

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
