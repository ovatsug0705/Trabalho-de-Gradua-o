<?php
namespace App\controllers;

use App\model\Bible;
use App\model\Cano;
use App\model\Filter;
use App\model\Search;
use App\model\Catechism;
use App\model\Encyclical;
use App\model\SocialDoctrine;

class Controller {

    private $instance;

    public function reqCatechism($page = 1) {
        $this->instance = new Catechism();
        $this->renderPage($this->instance->getCatechism($page), 'catechism.twig');
    }

    public function reqCano($cano = 1) {
        $this->instance = new Cano();
        $this->renderPage($this->instance->getCano($cano), 'cano.twig');
    }

    public function reqSocialDoctrine($paragraph = 1) {
        $this->instance = new SocialDoctrine();
        $this->renderPage($this->instance->getSocialDoctrine($paragraph), 'socialDoctrine.twig');
    }

    public function reqEncyclical($encyclical = false, $page = 1) {
        $this->instance = new Encyclical();
        $this->renderPage($this->instance->getEncyclical($encyclical, $page), 'encyclical.twig');
    }

    public function reqBible($book = false, $chapter = false) {
        $this->instance = new Bible();
        $this->renderPage($this->instance->getBible($book, $chapter), 'bible.twig');
    }

    public function search($text) {
        $this->instance = new Search();
        $this->renderPage($this->instance->search($text), 'search.twig');
    }

    public function bibleFilter($text, $partial, $books = null) {
        $this->instance = new Bible();
        $this->renderPage($this->instance->bibleFilter($text, $partial, $books), 'filter.twig');
    }

    public function textFilter($text, $doc) {
        $this->instance = new Filter();
        $this->renderPage($this->instance->textFilter($text, $doc), 'filter.twig');
    }

    /**
     * Render pages with returned data
     * 
     * @param $data = array
     * @param $page = String
     */
    private function renderPage($data, $page) {  
        
        if (isset($data) && !empty($data)) {
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
            echo $GLOBALS['twig']->render($page, $data);
        } else {
            echo $GLOBALS['twig']->render('404.twig');
        }
    }
}

