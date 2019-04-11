<?php
namespace App\route;
use App\controllers\Controller;

require_once 'vendor/autoload.php';

class Router {

    private static $routes = [
        "home" => 'home', 
        "catecismo" => 'getCatecismo()'
    ];

    private $url = '';
    
    public function setUrl($url) {
        $this->url = $url;
    }

    public function verifyUrl(){
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $this->setUrl($_GET['url']);
        } else {
            $this->setUrl('home');
        }
    }
    
    public function routing() {
        $this->url = array_filter(explode(" /", $this->url));

        $file = getcwd() . '/App/views/'. $this->url[0]. '.php';

        if (is_file($file) && ($this->url[0] != 'home')) {
            new Controller();
        } else if ($this->url[0] == 'home') {
            require getcwd() . '/App/views/home.php';
        } else {
            require getcwd() . '/App/views/404.php';
        }
    }
}
