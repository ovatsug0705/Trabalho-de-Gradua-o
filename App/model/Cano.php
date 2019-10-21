<?php

namespace App\model;
/**
 * Cano model class
 *
 * Performs the connection to Cano table into database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Cano {
    private $startConnection, $connection;

    /**
     * Cano class Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->startConnection = new DatabaseConnection($_ENV['APP_DB_HOST'], $_ENV['APP_DB_USER'], $_ENV['APP_DB_PASS'], $_ENV['APP_DB_NAME']);
        $this->connection = $this->startConnection->getConnection();
    }

    /**
     * Execute the querys in the database in the cano table
     *
     * @param integer  $cano number of the page of cano to be sought
     * @return PDO
     */
    public function getCano($cano){
        !(is_numeric($cano)) ? $cano = 0 : null;
        $endParagraph = $cano * 20;
        $initialParagraph = $endParagraph - 20;

        $sql = 'select paragraph_number, paragraph_text, paragraph_book, paragraph_partial, paragraph_title, paragraph_chapter, paragraph_article, ref_text from Canos left join Canos_references on Canos.id_cano = canos_references.id_cano where paragraph_number > (:iId) and paragraph_number <= (:eId) order by CAST(paragraph_number AS unsigned)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

// inner join canos_references on canos.id_cano = canos_references.id_cano
