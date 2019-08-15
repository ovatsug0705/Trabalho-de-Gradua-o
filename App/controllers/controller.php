<?php
namespace App\controllers;

use App\model\Bible;
use App\model\Cano;
use App\model\Filter;
use App\model\Search;
use App\model\Catechism;
use App\model\Encyclical;
use App\model\SocialDoctrine;

/**
 * Controller with aplication
 *
 * Performs the connection between the views and the database model classes
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Controller {
    
    private $instance;

    /**
     * Requires the texts of the Catechism 
     *
     * @param integer $page page number of the document that will be returned
     * @return void
     */ 
    public function reqCatechism($page) 
    {   
        $this->instance = new Catechism();
        $this->view($this->instance->getCatechism($page), 'catechism.html', 'Catecismo', is_numeric($page) ? $page : '1');
    }

    /**
     * Requires the texts of the Cano
     *
     * @param integer $page page number of the document that will be returned
     * @return void
     */
    public function reqCano($cano) 
    {
        $this->instance = new Cano();
        $this->view($this->instance->getCano($cano), 'cano.html', 'Código de Direito Canônico', is_numeric($cano) ? $cano : '1');
    }

    /**
     * Requires the texts of the Social Doctrine
     *
     * @param integer $page page number of the document that will be returned
     * @return void
     */
    public function reqSocialDoctrine($paragraph) 
    {
        $this->instance = new SocialDoctrine();
        $this->view($this->instance->getSocialDoctrine($paragraph), 'socialDoctrine.html', 'Doutrina Social', is_numeric($paragraph) ? $paragraph : '1');
    }

    /**
     * Requires the texts of the Encyclical
     *
     * @param string/boolean $encyclical name of the encyclical to be sought (if it is passed)
     * @param integer $page page number of the document that will be returned
     * @return void
     */
    public function reqEncyclical($encyclical, $page)
    {
        $this->instance = new Encyclical();
        $data = $this->instance->getEncyclical($encyclical, $page);

        $this->view($data[0], 'encyclical.html', !empty($data) ? $data[0]['encyclical_name'] : '', is_numeric($page) ? $page : '1');
    }

    /**
     * Requires the Encyclics page
     * @return void
     */
    public function reqEncyclicalPage() {
        $this->instance = new Encyclical();
        $this->view($this->instance->getEncyclical(false, false), 'encyclics.html', 'Encíclicas papais');
    }

    /**
     * Requires the texts of the Bible
     *
     * @param string/boolean $book name of the book of bible to be sought (if it is passed)
     * @param integer/boolean $chapter chapter number of the book that will be returned (if it is passed)
     * @return void
     */
    public function reqBible($book, $chapter)
    {
        
        $this->instance = new Bible();
        $data = $this->instance->getBible($book, $chapter);
        
        $this->view($data, 'book.html', !empty($data) ? $data[0]['book_name'] : '', is_numeric($chapter) ? $chapter : '1');
    }

     /**
     * Requires the Bible page
     * @return void
     */
    public function reqBiblePage() {
        $this->instance = new Bible();
        $this->view($this->instance->getBible(false, false), 'bible.html', 'Bíblia');
    }

    /**
     * Search for specific text in the name of documents
     *
     * @param string $text text to be searched
     * @return void
     */
    public function search($text)
    {
        $this->instance = new Search();
        $this->view($this->instance->search($text), 'search.html', 'Busca');
    }

    /**
     * Filter specific text in the bible
     *
     * @param string $text text to be searched
     * @param string $partial name of the partial to be searched
     * @param string/null $books name of the books of bible to be sought (if it is passed)
     * @return void
     */
    public function bibleFilter($text, $partial, $books) 
    {
        $this->instance = new Bible();
        $this->view($this->instance->bibleFilter($text, $partial, $books), 'filter.html');
    }

    /**
     * Filter specific text in other documents (except bible)
     *
     * @param string $text text to be searched
     * @param string $doc name of the document where the search will be performed
     * @return void
     */
    public function textFilter($text, $doc) 
    {
        $this->instance = new Filter();
        $this->view($this->instance->textFilter($text, $doc), 'filter.html');
    }

    /**
     * Render pages with returned data using Twig
     * 
     * @param array  $data data returned with database
     * @param string $page page that will be returned to the browser
     */
    private function view($data, $page, $title = '', $paginate = null) {
        
        if (isset($data) && !empty($data)) {
            echo $GLOBALS['twig']->render($page, ['data' => $data, 'title' => $title, 'paginate' => $paginate]);
        } else {
            echo $GLOBALS['twig']->render('notFound.html');
        }
    }
}
