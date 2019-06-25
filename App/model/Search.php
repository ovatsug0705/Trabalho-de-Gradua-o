<?php

namespace App\model;

class Search {
  private $startConnection, $connection, $data;

  public function __construct() {
    $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
    $this->connection = $this->startConnection->getConnection();
  }

  public function search($text) {
    if ($text) {
      $sql = "select nome_livro, url from livros where nome_livro like :text";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindValue(':text', "%{$text}%");
      $stmt->execute(); 

      $data['livros'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      $sql = "select nome, url from enciclica_papal where nome like :text or papa like :text2";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindValue(':text', "%{$text}%");
      $stmt->bindValue(':text2', "%{$text}%");
      $stmt->execute();
      $this->connection = null;
      
      $data['enciclicas'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      $data['canodo'] = stristr('canodos', $text) === false ? false : true;
      $data['doutrina_social'] = stristr('doutrina social', $text) === false ? false : true;
      $data['catecismo'] = stristr('catecismo', $text) === false ? false : true;

      if(empty($data['livros']) && empty($data['enciclicas']) && !$data['canodo'] && !$data['catecismo'] && !$data['doutrina_social']) {
        return null;
      } else {
        return $data;
      }
    }
  }
}
