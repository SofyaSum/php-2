<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        $path = ['\\', 'app/'];
        $alter = ['/', '../'];

        $fileName = str_replace($path, $alter, $className) . '.php';
        var_dump($fileName);
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
