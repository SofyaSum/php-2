<?php

namespace app\engine;

use app\interfaces\IRender;

class TwigRender implements IRender
{
  public function renderTemplate($template, $params = [])
  {
    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);
    return $twig->render($template . '.twig', $params);
  }
}