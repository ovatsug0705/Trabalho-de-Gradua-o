<?php
namespace App\controllers;

use App\model\Canodo;
use App\model\Biblia;
use App\model\Search;
use App\model\Catecismo;
use App\model\Enciclicas;
use App\model\DoutrinaSocial;

class Controller {

    private $catecismo, $canodo, $doutrinaSocial, $enciclicas, $biblia, $search;

    public function reqCatecismo($page = 1) {
        $this->catecismo = new Catecismo();
        $this->renderPage($this->catecismo->getCatecismo($page), 'catecismo');
    }

    public function reqCanodo($canon = 1) {
        $this->canodo = new Canodo();
        $this->renderPage($this->canodo->getCanodo($canon), 'canodo');
    }

    public function reqDoutrinaSocial($paragraph = 1) {
        $this->doutrinaSocial = new DoutrinaSocial();
        $this->renderPage($this->doutrinaSocial->getDoutrinaSocial($paragraph), 'doutrina_social');
    }

    public function reqEnciclica($enciclica = false) {
        $this->enciclicas = new Enciclicas();
        $this->renderPage($this->enciclicas->getEnciclica($enciclica), 'enciclica');
    }

    public function reqBiblia($livro = false) {
        $this->biblia = new Biblia();
        $this->renderPage($this->biblia->getBiblia($livro), 'biblia');
    }

    public function search($text) {
        $this->search = new Search();
        $this->renderPage($this->search->search($text), 'busca');
    }

    private function renderPage($data, $template) {       
        if (isset($data) && !empty($data)) {
            require __DIR__. '\..\views/' . $template . '.php';  
        } else {
            require __DIR__. '\..\views\404.php';
        }
    }
}

