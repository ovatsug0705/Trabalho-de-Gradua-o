<?php

namespace App\Model;

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
        $this->startConnection = new DatabaseConnection($_ENV['APP_DB_HOST'], $_ENV['APP_DB_USER'], $_ENV['APP_DB_PASS'], $_ENV['APP_DB_NAME']);
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
        $endParagraph = $page * 20;
        $initialParagraph = $endParagraph - 20;

        $sql = 'select paragraph_number, paragraph_text, paragraph_partial, paragraph_section, paragraph_chapter, paragraph_article, paragraph_title, ref_text, (select count(id_catechism) from Catechism) as count_paragraph from Catechism left join Catechism_references on Catechism.id_catechism = Catechism_references.id_catechism where paragraph_number > (:iId) and paragraph_number <= (:eId) order by CAST(paragraph_number AS unsigned)';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':iId', $initialParagraph);
        $stmt->bindValue(':eId', $endParagraph);

        $stmt->execute();
        $this->connection = null;
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
