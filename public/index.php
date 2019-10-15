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
use Jenssegers\Blade\Blade;
$GLOBALS['blade'] = new Blade(__DIR__ . '\..\App\views/', __DIR__ . '\..\App\views/cache/');

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

use App\routes\Router;
$route = new Router();

?>
