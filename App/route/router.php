<?php
namespace App\route;
use App\controllers\Controller;
class Router {

    private $url = '';

    public function setUrl($url) {
        $this->url = $url;
    }

    public function verifyUrl(){
        if (isset($_REQUEST["url"]) && !empty($_REQUEST["url"])) {
            $this->setUrl($_REQUEST["url"]);
        } else {
            $this->setUrl('home');
        }
    }

    public function routing() {
        $this->url = explode("/", trim($this->url, "/"));
        $instance = false;

        switch ($this->url[0]) {
            case 'catecismo':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqCatecismo();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqCatecismo($this->url[1]);
                }
                break;
            case 'canodo':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqCanodo();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqCanodo($this->url[1]);
                }
                break;
            case 'doutrina_social':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqDoutrinaSocial();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqDoutrinaSocial($this->url[1]);
                }
                break;
            case 'enciclicas':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqEnciclica();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqEnciclica($this->url[1]);
                }
                break;
            case 'biblia':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqBiblia();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqBiblia($this->url[1]);
                }
                break;
            case 'home':
                $instance = true;
                require __DIR__ . '\..\views\home.php';
                break;
        }

        if(!$instance) {
            require  __DIR__ . '\..\views\404.php';
        }
    }
}
