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
        $this->startConnection = new DatabaseConnection($_ENV['APP_DB_HOST'], $_ENV['APP_DB_USER'], $_ENV['APP_DB_PASS'], $_ENV['APP_DB_NAME']);
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
            $sql = 'select distinct pontiff from encyclical';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $pontiffs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $data = null;
            foreach ($pontiffs as $pontiff) {
                $sql = "select pontiff, encyclical_name, url_text from encyclical where pontiff = '${pontiff['pontiff']}'";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $data[] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }

            $this->connection= null;
            return $data;
        } else {
            !(is_numeric($page)) ? $page = 0 : null;
            $endParagraph = $page * 20;
            $initialParagraph = $endParagraph - 20;

            $sql = 'select encyclical_name, paragraph_text, paragraph_number, url_text, ref_text from encyclical_text inner join Encyclical on Encyclical_text.id_encyclical = Encyclical.id_encyclical left join Encyclical_text_references on Encyclical_text.id_encyclical_text = Encyclical_text_references.id_encyclical_text where url_text = (:url) and paragraph_number >= (:iId) and paragraph_number <= (:eId) order by CAST(paragraph_number AS unsigned)';

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
