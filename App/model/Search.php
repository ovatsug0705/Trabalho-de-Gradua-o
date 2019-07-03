<?php

namespace App\model;

class Search {
  private $startConnection, $connection, $data;

  public function __construct() {
    $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
    $this->connection = $this->startConnection->getConnection();
  }

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

      if(empty($data['books']) && empty($data['encyclical']) && !$data['cano'] && !$data['catechism'] && !$data['social_doctrine']) {
        return null;
      } else {
        return $data;
      }
    }
  }
}
