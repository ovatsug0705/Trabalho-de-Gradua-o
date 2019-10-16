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
class Router
{

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
    if (isset($_REQUEST["url"]) && !empty($_REQUEST["url"])) {
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
    $instance = new Controller();

    switch ($this->url[0]) {
      case 'catecismo':
        if (count($this->url) <= 2) {
          $instance->reqCatechism(!empty($this->url[1]) ? $this->url[1] : 1);
          break;
        }
      case 'canodo':
        if (count($this->url) <= 2) {
          $instance->reqCano(!empty($this->url[1]) ? $this->url[1] : 1);
          break;
        }
      case 'doutrina_social':
        if (count($this->url) <= 2) {
          $instance->reqSocialDoctrine(!empty($this->url[1]) ? $this->url[1] : 1);
          break;
        }
      case 'enciclicas':
        if (count($this->url) == 1) {
          $instance->reqEncyclicalPage();
          break;
        } else if (count($this->url) <= 3) {
          $instance->reqEncyclical(
            !empty($this->url[1]) ? $this->url[1] : false,
            !empty($this->url[2]) ? $this->url[2] : 1
          );
          break;
        }
      case 'biblia':
        if (count($this->url) == 1) {
          $instance->reqBiblePage();
          break;
        } else if (count($this->url) <= 3) {
          $instance->reqBible(
            !empty($this->url[1]) ? $this->url[1] : false,
            !empty($this->url[2]) ? $this->url[2] : false
          );
          break;
        }
      case 'busca':
        if(!empty($_GET['s'])) {
          $instance->search($_GET['s']);
          break;
        }
      case 'filtro':
        if (!empty($this->url[1])) {
          if (($this->url[1] == 'biblia') && !empty($_GET['t']) && !empty($_GET['p'])) {
            $instance->bibleFilter($_GET['t'], $_GET['p'], !empty($_GET['b']) ? $_GET['b'] : null);
            break;
          } else if (($this->url[1] == 'pas') && !empty($_GET['l']) && !empty($_GET['c'])) {
            header("Location: /biblia/{$_GET['l']}/{$_GET['c']}");
          } else if (!empty($_GET['t'])) {
            $instance->textFilter($_GET['t'], $this->url[1]);
            break;
          } else if (!empty($_GET['n'])) {

            switch ($this->url[1]) {
              case 'catecismo':
                $paginate = 20;
                $maxNumber = 2865;
                break;
              case 'doutrina_social':
                $paginate = 20;
                $maxNumber = 578;
                break;
              case 'canodo':
                $paginate = 20;
                $maxNumber = 1734;
                break;
            }
            
            if(is_numeric($_GET['n'])){
              $page = ($_GET['n'] % $paginate) == 0 ? (int)($_GET['n'] / $paginate) : (int)($_GET['n'] / $paginate) + 1;

              if($_GET['n'] <= $maxNumber) {
                header("Location: /{$this->url[1]}/{$page}#{$_GET['n']}");
              }
            }
            
          }
        }
      case 'home':
        echo $GLOBALS['blade']->render('home', ['title' => 'Home']);
        break;
      default :
        echo $GLOBALS['blade']->render('notFound', ['title' => '404']);
    }
  }
}
