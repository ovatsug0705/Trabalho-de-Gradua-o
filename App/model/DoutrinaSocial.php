<?php

namespace App\model;

class DoutrinaSocial {
    private $startConnection;
    private $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getDoutrinaSocial($paragraph){
        !(is_numeric($paragraph)) ? $paragraph = 0 : null;
        $endParagraph = $paragraph * 5;
        $initialParagraph = $endParagraph - 5;

        $sql = 'select numero, texto from doutrina_social where numero > (:iId) and numero <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
