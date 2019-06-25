<?php

namespace App\model;

class Biblia {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getBiblia($livro, $capitulo){
        if (!$livro) {
            $sql = 'select nome_livro from livros';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $this->connection = null;
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else if(!$capitulo) {
            $sql = 'select livros.nome_livro, versiculos.numero, versiculos.capitulo, versiculos.texto from livros inner join versiculos on livros.id_livro = versiculos.id_livro where livros.url = :livro order by CAST(versiculos.capitulo AS unsigned), CAST(versiculos.numero AS unsigned)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':livro', $livro);
            $stmt->execute();
            $this->connection = null;

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = 'select livros.nome_livro, versiculos.numero, versiculos.capitulo, versiculos.texto from livros inner join versiculos on livros.id_livro = versiculos.id_livro where livros.url = :livro and versiculos.capitulo = :capitulo order by CAST(versiculos.capitulo AS unsigned), CAST(versiculos.numero AS unsigned)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':livro', $livro);
            $stmt->bindValue(':capitulo', $capitulo);
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
                    $string = "{$string} nome_livro = '{$value}' or";
                }

                $size = strlen($string);
                $string = substr($string, 1, $size - 3);
                
            } else {
                return false;
            }
            
            $sql = "select nome_livro, url, numero, capitulo, texto from livros inner join versiculos on livros.id_livro = versiculos.id_livro where texto like :text and ({$string}) order by CAST(versiculos.capitulo AS unsigned), CAST(versiculos.numero AS unsigned)";
        } else {
            $sql = 'select nome_livro, url, numero, capitulo, texto from livros inner join versiculos on livros.id_livro = versiculos.id_livro where texto like :text and (testamento = :test1 or testamento = :test2) order by CAST(versiculos.capitulo AS unsigned), CAST(versiculos.numero AS unsigned)';
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
