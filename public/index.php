<?php

/**
 * Aplication Index
 *
 * PHP version 7.0
 *
 * @category   Project
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @copyright  2019 Gustavo Gomes
 * @version    1.0.0
 * @link       https://vidacrista.com.br
 */

require_once './../vendor/autoload.php';

use Twig\Loader\FilesystemLoader;

$loader = new Twig\Loader\FilesystemLoader([
  'paths' => __DIR__ . '\..\App\views/'
]);

$GLOBALS['twig'] = new Twig\Environment($loader);

//debug
$GLOBALS['twig'] = new Twig\Environment($loader, [
  'debug' => true,
]);
$GLOBALS['twig']->addExtension(new Twig\Extension\DebugExtension());

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

use App\routes\Router;
$route = new Router();

?>
