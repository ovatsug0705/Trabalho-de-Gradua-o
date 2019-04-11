<?php
namespace App\controllers;
use App\model\Catecismo;

class Controller {

    private static $catecismo;
    private static $catecismoData;

    public function __construct() {
        Controller::$catecismo = new Catecismo();
        Controller::$catecismo->openConnection();
        Controller::$catecismoData = Controller::$catecismo->getCatecismo();
        $this->renderCatecismo();
    }

    private function renderCatecismo() {
        require getcwd(). '/App/views/catecismo.php';        
    }   
}

