<?php

namespace App\model;

class Canodo {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getCanodo($cannon){
        !(is_numeric($cannon)) ? $cannon = 0 : null;
        $endParagraph = $cannon * 5;
        $initialParagraph = $endParagraph - 5;

        $sql = 'select numero, texto from canodos where numero > (:iId) and numero <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
