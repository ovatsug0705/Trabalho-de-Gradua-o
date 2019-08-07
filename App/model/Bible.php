<?php

namespace App\model;
/**
 * Bible model class
 *
 * Performs the connection to Books and versers tables into database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class Bible {
    private $startConnection, $connection;

    /**
     * Bible class Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->startConnection = new DatabaseConnection(getenv('APP_HOST'), getenv('APP_DB_USER'), getenv('APP_DB_PASS'), getenv('APP_DB_NAME'));
        $this->connection = $this->startConnection->getConnection();
    }

    /**
     * Execute the querys in the database in the book and versers tables
     *
     * @param string  $book name of the book of bible to be sought
     * @param integer $chapter chapter number of the book that will be returned 
     * @return PDO 
     */
    public function getBible($book, $chapter){
        if (!$book) {
            $sql = 'select book_name, url_text from books';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $this->connection = null;

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else if(!$chapter) {
            $sql = 'select book_name, verser_number, chapter, verser_text from books inner join verser on books.id_book = verser.id_book where books.url_text = :url order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':url', $book);
            $stmt->execute();
            $this->connection = null;

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = 'select book_name, verser_number, chapter, verser_text from books inner join verser on books.id_book = verser.id_book where books.url_text = :url and chapter = :chapter order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':url', $book);
            $stmt->bindValue(':chapter', $chapter);
            $stmt->execute();
            $this->connection = null;

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * Filter texts in the books and versers tables
     *
     * @param string $text text to be searched
     * @param string $partial name of the partial to be searched
     * @param string $books name of the books of bible to be sought
     * @return PDO
     */
    public function bibleFilter($text, $partial, $books){
        if ($partial == 'customized') {
            $string = '';
            if($books){
                foreach ($books as $value) {
                    $string = "{$string}book_name = '{$value}' or ";
                }

                $size = strlen($string);
                $string = substr($string, 0, $size - 3);
            } else {
                return false;
            }
            
            $sql = "select book_name, url_text, chapter, verser_number, verser_text from books inner join verser on books.id_book = verser.id_book where verser_text like :text and ({$string}) order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)";

            $stmt = $this->connection->prepare($sql);
        } else {
            $sql = 'select book_name, url_text, chapter, verser_number, verser_text from books inner join verser on books.id_book = verser.id_book where verser_text like :text and (testament = :test1 or testament = :test2) order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)';

            $stmt = $this->connection->prepare($sql);

            switch ($partial) {
                case 'new':
                    $stmt->bindValue(':test1', 'novo');
                    $stmt->bindValue(':test2', 'novo');
                    break;
                case 'old':
                    $stmt->bindValue(':test1', 'antigo');
                    $stmt->bindValue(':test2', 'antigo');
                    break;
                case 'all':
                    $stmt->bindValue(':test1', 'antigo');
                    $stmt->bindValue(':test2', 'novo');
                    break;
            }
        }

        $stmt->bindValue(':text', "%{$text}%");
        $stmt->execute();
        $this->connection = null;

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
