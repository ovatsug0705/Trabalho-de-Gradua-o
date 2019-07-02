<?php

namespace App\model;

class Cano {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getCano($cano){
        !(is_numeric($cano)) ? $cano = 0 : null;
        $endParagraph = $cano * 5;
        $initialParagraph = $endParagraph - 5;

        $sql = 'select paragraph_number, paragraph_text from cano where paragraph_number > (:iId) and paragraph_number <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
