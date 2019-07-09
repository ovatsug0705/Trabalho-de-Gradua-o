<?php
namespace App\routes;
use App\controllers\Controller;

/**
 * Router with aplication
 *
 * Processes browser requests
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Router {

    private $url = '';

    /**
     * Router constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->verifyUrl();
        $this->routing();
    }

    /**
     * Set url variable valor
     * 
     * @param string $url url text
     * @return void
     */
    public function setUrl($url) 
    {
        $this->url = $url;
    }

    /**
     * Check the type of url
     * 
     * @return void
     */
    public function verifyUrl()
    {
        if (isset($_REQUEST["url"]) && !empty($_REQUEST["url"])) 
        {
            $this->setUrl($_REQUEST["url"]);
        } else {
            $this->setUrl('home');
        }
    }

    /**
     * Performs the routing of the required routes
     * 
     * @return void
     */
    public function routing() 
    {
        $this->url = explode("/", trim($this->url, "/"));
        $instance = false;

        switch ($this->url[0]) {
            case 'catecismo':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqCatechism();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqCatechism($this->url[1]);
                }
                break;
            case 'canodo':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqCano();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqCano($this->url[1]);
                }
                break;
            case 'doutrina_social':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqSocialDoctrine();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqSocialDoctrine($this->url[1]);
                }
                break;
            case 'enciclicas':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqEncyclical();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqEncyclical($this->url[1]);
                } else if (count($this->url) == 3) {
                    $instance = new Controller();
                    $instance->reqEncyclical($this->url[1], $this->url[2]);
                }
                break;
            case 'biblia':
                if (count($this->url) == 1) {
                    $instance = new Controller();
                    $instance->reqBible();
                } else if (count($this->url) == 2) {
                    $instance = new Controller();
                    $instance->reqBible($this->url[1]);
                } else if (count($this->url) == 3) {
                    $instance = new Controller();
                    $instance->reqBible($this->url[1], $this->url[2]);
                }
                break;
            case 'busca':
                if (!empty($_GET['s'])){
                    $instance = new Controller();
                    $instance->search($_GET['s']);
                }
                break;
            case 'filtro':
                if(!empty($this->url[1])){
                    if (($this->url[1] == 'bib') && !empty($_GET['t']) && !empty($_GET['p'])) {
                        $instance = new Controller();

                        !empty($_GET['b']) ? $instance->bibleFilter($_GET['t'], $_GET['p'], $_GET['b']) : $instance->bibleFilter($_GET['t'], $_GET['p']);
                    } else if (($this->url[1] == 'pas') && !empty($_GET['l']) && !empty($_GET['c'])){
                       header("Location: {$_SERVER['REQUEST_URI']}/{$_GET['l']}/{$_GET['c']}");
                    } else if (!empty($_GET['t'])) {
                        switch ($this->url[1]) {
                            case 'enc':
                                $instance = new Controller();
                                $instance->textFilter($_GET['t'], 'enc');
                                break;
                            case 'cic':
                                $instance = new Controller();
                                $instance->textFilter($_GET['t'], 'cic');
                                break;
                            case 'can':
                                $instance = new Controller();
                                $instance->textFilter($_GET['t'], 'can');
                                break;
                            case 'dou':
                                $instance = new Controller();
                                $instance->textFilter($_GET['t'], 'dou');
                                break;
                        }
                    }
                }
                break;
            case 'home':
                $instance = true;
                echo $GLOBALS['twig']->render('home.html');
                break;
        }

        if(!$instance) {
            echo $GLOBALS['twig']->render('404.html');
        }
    }
}
