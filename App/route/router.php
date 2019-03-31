<?php
namespace App\route;
use App\model\Catecismo;

require_once 'vendor/autoload.php';

class Router {

    private $routes = [
        'home', 'catecismo'
    ];
    private static $url = '';
    
    public static function setUrl($url) {
        Router::$url = $url;
    }

    public function setRoute($route) {
        array_push($this->routes, $route);
    }

    public function verifyUrl(){
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            Router::setUrl($_GET['url']);
        } else {
            Router::setUrl('home');
        }
    }
    
    public function routing() {
        Router::$url = array_filter(explode(" /", Router::$url));

        $file = getcwd() . '/App/views/'. Router::$url[0]. '.php';

        if (is_file($file) && (Router::$url[0] != 'home')) {
            $catecismo = new Catecismo();
            $catecismo->openConnection();
            $catecismo->getCatecismo();
        } else if (Router::$url[0] == 'home') {
            require getcwd() . '/App/views/home.php';
        } else {
            require getcwd() . '/App/views/404.php';
        }
    }

    
}
