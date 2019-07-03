<?php

require_once './../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '\..\App\views/');
$GLOBALS['twig'] = new \Twig\Environment($loader);

use App\routes\Router;
$route = new Router();
$route->verifyUrl();
$route->routing();
