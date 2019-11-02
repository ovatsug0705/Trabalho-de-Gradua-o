<?php

namespace App\Model;

/**
 * SocialDoctrine model class
 *
 * Performs the connection to SocialDoctrine table into database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class SocialDoctrine {
    private $startConnection, $connection;

    /**
     * SocialDoctrine class Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->startConnection = new DatabaseConnection($_ENV['APP_DB_HOST'], $_ENV['APP_DB_USER'], $_ENV['APP_DB_PASS'], $_ENV['APP_DB_NAME']);
        $this->connection = $this->startConnection->getConnection();    
    }

    /**
     * Execute the querys in the database in the SocialDoctrine table
     *
     * @param integer $paragraph number of the page of cano to be sought
     * @return PDO
     */
    public function getSocialDoctrine($paragraph){
        !(is_numeric($paragraph)) ? $paragraph = 0 : null;
        $endParagraph = $paragraph * 20;
        $initialParagraph = $endParagraph - 20;

        $sql = 'select paragraph_number, paragraph_text, paragraph_partial, paragraph_chapter, paragraph_section, paragraph_title, ref_text, (select count(id_social_doctrine) from Social_doctrine) as count_paragraph from Social_doctrine left join Social_doctrine_references on Social_doctrine.id_social_doctrine = Social_doctrine_references.id_social_doctrine where paragraph_number > (:iId) and paragraph_number <= (:eId) order by CAST(paragraph_number AS unsigned)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
