<?php
namespace App\controllers;

use App\model\Bible;
use App\model\CAno;
use App\model\Filter;
use App\model\Search;
use App\model\Catechism;
use App\model\Encyclical;
use App\model\SocilaDoctrine;

class Controller {

    private $instance;

    public function reqCatechism($page = 1) {
        $this->instance = new Catechism();
        $this->renderPage($this->instance->getCatechism($page), 'catechism');
    }

    public function reqCano($cano = 1) {
        $this->instance = new Cano();
        $this->renderPage($this->instance->getCano($cano), 'cano');
    }

    public function reqSocilaDoctrine($paragraph = 1) {
        $this->instance = new SocilaDoctrine();
        $this->renderPage($this->instance->getSocilaDoctrine($paragraph), 'socilaDoctrine');
    }

    public function reqEncyclical($encyclical = false, $page = 1) {
        $this->instance = new Encyclical();
        $this->renderPage($this->instance->getEncyclical($encyclical, $page), 'encyclical');
    }

    public function reqBible($book = false, $chapter = false) {
        $this->instance = new Bible();
        $this->renderPage($this->instance->getBible($book, $chapter), 'bible');
    }

    public function search($text) {
        $this->instance = new Search();
        $this->renderPage($this->instance->search($text), 'search');
    }

    public function bibleFilter($text, $partial, $books = null) {
        $this->instance = new Bible();
        $this->renderPage($this->instance->bibleFilter($text, $partial, $books), 'filter');
    }

    public function textFilter($text, $doc) {
        $this->instance = new Filter();
        $this->renderPage($this->instance->textFilter($text, $doc), 'filter');
    }

    /**
     * Render pages with returned data
     * 
     * @param $data = @array
     * @param $page = @String
     */
    private function renderPage($data, $page) {   
        if (isset($data) && !empty($data)) {
            require __DIR__. '\..\views/' . $page . '.php';  
        } else {
            require __DIR__. '\..\views\404.php';
        }
    }
}

