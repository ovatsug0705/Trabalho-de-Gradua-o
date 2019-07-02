<?php

namespace App\model;

class Bible {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'dev_vida_crista', '80ab55sd', 'VidaCrista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getBible($book, $chapter){
        if (!$book) {
            $sql = 'select book_name from books';

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

    public function bibleFilter($text, $partial, $books){
        if ($partial == 'customized') {
            $string = '';
            if($books){
                foreach ($books as $value) {
                    $string = "{$string} book_name = '{$value}' or";
                }

                $size = strlen($string);
                $string = substr($string, 1, $size - 3);
                
            } else {
                return false;
            }
            
            $sql = "select book_name, url_text, verser_number, chapter, verser_text from books inner join verser on books.id_book = verser.id_book where verser_number like :text and ({$string}) order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)";
        } else {
            $sql = 'select book_name, url_text, verser_number, chapter, verser_text from books inner join verser on books.id_book = verser.id_book where verser_text like :text and (testament = :test1 or testament = :test2) order by CAST(chapter AS unsigned), CAST(verser_number AS unsigned)';
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':text', "%{$text}%");

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

        $stmt->execute();
        $this->connection = null;

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
