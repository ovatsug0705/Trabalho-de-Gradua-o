<?php

namespace App\model;

class SocialDoctrine {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getSocialDoctrine($paragraph){
        !(is_numeric($paragraph)) ? $paragraph = 0 : null;
        $endParagraph = $paragraph * 5;
        $initialParagraph = $endParagraph - 5;

        $sql = 'select paragraph_number, paragraph_text from social_doctrine where paragraph_number > (:iId) and paragraph_number <= (:eId)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
