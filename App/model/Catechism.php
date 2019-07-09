<?php

namespace App\model;

/**
 * Catechism model class
 *
 * Performs the connection to Catechism table into database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Catechism {
    private $startConnection, $connection;

    /**
     * Catechism Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->startConnection = new DatabaseConnection(getenv('APP_HOST'), getenv('APP_DB_USER'), getenv('APP_DB_PASS'), getenv('APP_DB_NAME'));
        $this->connection = $this->startConnection->getConnection();
    }

    /**
     * Execute the querys in the database in the Catechism table
     *
     * @param integer  $page number of the page of catechism to be sought
     * @return PDO
     */
    public function getCatechism($page){
        !(is_numeric($page)) ? $page = 0 : null;
        $endParagraph = $page * 2;
        $initialParagraph = $endParagraph - 2;

        $sql = 'select paragraph_number, paragraph_text, paragraph_partial, paragraph_section, paragraph_chapter, paragraph_article, paragraph_title, ref_text from Catechism left join Catechism_references on Catechism.id_catechism = Catechism_references.id_catechism where paragraph_number > (:iId) and paragraph_number <= (:eId) order by CAST(paragraph_number AS unsigned)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
