<?php

namespace App\model;

class Encyclical {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getEnciclica($encyclical, $page){
        if (!$encyclical) {
            $sql = 'select encyclical_name, pontiff from encyclical order by pontiff';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $this->connection= null;

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            !(is_numeric($page)) ? $page = 0 : null;
            $endParagraph = $page * 3;
            $initialParagraph = $endParagraph - 3;

            $sql = 'select encyclical_name,paragraph_text, paragraph_number from encyclical_text inner join encyclical on encyclical_text.id_encyclical = encyclical.id_encyclical where url_text = (:url) and paragraph_number > (:iId) and paragraph_number <= (:eId)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':url', $encyclical);
            $stmt->bindValue(':iId', $initialParagraph);
            $stmt->bindValue(':eId', $endParagraph);
            $stmt->execute();
            $this->connection = null;
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}
