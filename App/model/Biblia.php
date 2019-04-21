<?php

namespace App\model;

class Biblia {
    private $startConnection;
    private $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getBiblia($livro){
        if (!$livro) {
            $sql = 'select nome_livro from livros';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = 'select livros.nome_livro, versiculos.numero, versiculos.capitulo, versiculos.texto from livros inner join versiculos on livros.id_livro = versiculos.id_livro where livros.url = :livro order by CAST(versiculos.capitulo AS unsigned), CAST(versiculos.numero AS unsigned)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':livro', $livro);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}
