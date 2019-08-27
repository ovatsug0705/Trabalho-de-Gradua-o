<?php

namespace App\model;

/**
 * Search model class
 *
 * Search texts in documents names in the database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */
class Search {
  private $startConnection, $connection, $data;

  /**
   * Search class Constructor
   *
   * @return void
   */
  public function __construct() {
    $this->startConnection = new DatabaseConnection(getenv('APP_HOST'), getenv('APP_DB_USER'), getenv('APP_DB_PASS'), getenv('APP_DB_NAME'));
    $this->connection = $this->startConnection->getConnection();
  }

  /**
   * Search texts
   * 
   * @param string $text text to be searched
   * @return PDO
   */
  public function search($text) {
    if ($text) {
      $sql = "select book_name, url_text from Books where book_name like :text";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindValue(':text', "%{$text}%");
      $stmt->execute(); 

      $data['books'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      $sql = "select encyclical_name, url_text from Encyclical where encyclical_name like :text or pontiff like :text2";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindValue(':text', "%{$text}%");
      $stmt->bindValue(':text2', "%{$text}%");
      $stmt->execute();
      $this->connection = null;
      
      $data['encyclical'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      $data['cano'] = stristr('canodos', $text) === false ? false : true;
      $data['social_doctrine'] = stristr('doutrina social', $text) === false ? false : true;
      $data['catechism'] = stristr('catecismo', $text) === false ? false : true;
      $data['text'] = $text;

      return $data;

      // if(empty($data['books']) && empty($data['encyclical']) && !$data['cano'] && !$data['catechism'] && !$data['social_doctrine']) {
      //   return null;
      // } else {
      //   return $data;
      // }
    }
  }
}
