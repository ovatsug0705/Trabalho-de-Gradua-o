<?php

namespace App\model;

class Catecismo {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getCatecismo($page){
        !(is_numeric($page)) ? $page = 0 : null;
        $endParagraph = $page * 2;
        $initialParagraph = $endParagraph - 2;

        $sql = 'select numero, texto from catecismo where numero > (:iId) and numero <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
