<?php

namespace App\model;

/**
 * Encyclical model class
 *
 * Performs the connection to Encyclical and Encyclical_text tables into database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Encyclical {
    private $startConnection, $connection;

    /**
     * Encyclical class Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->startConnection = new DatabaseConnection(getenv('APP_HOST'), getenv('APP_DB_USER'), getenv('APP_DB_PASS'), getenv('APP_DB_NAME'));
        $this->connection = $this->startConnection->getConnection();
    }

    /**
     * Execute the querys in the database in the Encyclical and Encyclical_text table
     * 
     * @param string  $encyclical encyclical name
     * @param integer $page number of the page of Encyclical to be sought
     * @return PDO
     */
    public function getEncyclical($encyclical, $page){
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
