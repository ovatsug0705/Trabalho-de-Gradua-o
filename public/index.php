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
$GLOBALS['blade'] = new Blade(__DIR__ . '/../App/views', __DIR__ . '/../App/views/cache');

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

use App\Routes\Router;

if($_ENV[""])

if($_ENV['APP_ENVOINEMENT'] == 'Production') {
  require_once './../App/routes/router.php';
  require_once './../App/controllers/controller.php';
  require_once './../App/model/DatabaseConnection.php';
  require_once './../App/model/Bible.php';
  require_once './../App/model/Cano.php';
  require_once './../App/model/Catechism.php';
  require_once './../App/model/Encyclical.php';
  require_once './../App/model/Filter.php';
  require_once './../App/model/Search.php';
  require_once './../App/model/SocialDoctrine.php';
};

$route = new Router();

?>
