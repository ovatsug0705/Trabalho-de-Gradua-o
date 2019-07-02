<?php

namespace App\model;

class Catechism {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getCatechism($page){
        !(is_numeric($page)) ? $page = 0 : null;
        $endParagraph = $page * 2;
        $initialParagraph = $endParagraph - 2;

        $sql = 'select paragraph_number, paragraph_text from catechism where paragraph_number > (:iId) and paragraph_number <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
