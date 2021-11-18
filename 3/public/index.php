<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'CustomParser.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader, []);
$template = $_GET['image'] ? 'image.twig' : 'index.twig';
$tempData = [
    [
        'src' => '../img/1.jpg',
        'name' => '1',
    ],
    [
        'src' => '../img/2.jpg',
        'name' => '2',
    ],
    [
        'src' => '../img/3.jpg',
        'name' => '3',
    ]
];

try {
    echo $twig->render($template, ['tempData' => $tempData, 'name' => $_GET['image']]);
}
catch ( Exception $exception ) {
    var_dump($exception);
}