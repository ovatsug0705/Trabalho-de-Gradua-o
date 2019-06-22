<?php
namespace App\controllers;

use App\model\Canodo;
use App\model\Biblia;
use App\model\Search;
use App\model\Catecismo;
use App\model\Enciclicas;
use App\model\DoutrinaSocial;

class Controller {

    private $instance;

    public function reqCatecismo($page = 1) {
        $this->instance = new Catecismo();
        $this->renderPage($this->instance->getCatecismo($page), 'catecismo');
    }

    public function reqCanodo($canon = 1) {
        $this->instance = new Canodo();
        $this->renderPage($this->instance->getCanodo($canon), 'canodo');
    }

    public function reqDoutrinaSocial($paragraph = 1) {
        $this->instance = new DoutrinaSocial();
        $this->renderPage($this->instance->getDoutrinaSocial($paragraph), 'doutrina_social');
    }

    public function reqEnciclica($encyclical = false, $page = 1) {
        $this->instance = new Enciclicas();
        $this->renderPage($this->instance->getEnciclica($encyclical, $page), 'enciclica');
    }

    public function reqBiblia($livro = false, $capitulo = false) {
        $this->instance = new Biblia();
        $this->renderPage($this->instance->getBiblia($livro, $capitulo), 'biblia');
    }

    public function search($text) {
        $this->instance = new Search();
        $this->renderPage($this->instance->search($text), 'busca');
    }

    public function bibleFilter($text, $partial, $books = null) {
        $this->instance = new Biblia();
        $this->renderPage($this->instance->bibleFilter($text, $partial, $books), 'busca');
    }

    public function encyclicalFilter($text) {
        $this->instance = new Enciclicas();
        $this->renderPage($this->instance->encyclicalFilter($text), 'busca');
    }

    private function renderPage($data, $template) {       
        if (isset($data) && !empty($data)) {
            require __DIR__. '\..\views/' . $template . '.php';  
        } else {
            require __DIR__. '\..\views\404.php';
        }
    }
}

