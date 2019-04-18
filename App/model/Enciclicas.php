<?php

namespace App\model;

class Enciclicas {
    private $startConnection;
    private $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getEnciclica($enciclica){
        if (!$enciclica) {
            $sql = 'select nome, papa from enciclica_papal order by papa';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = 'select enciclica_papal.nome, texto_eciclica_papal.texto from texto_eciclica_papal inner join enciclica_papal on texto_eciclica_papal.id_enciclica = enciclica_papal.id_enciclica where enciclica_papal.nome = (:nome)';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome', $enciclica);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        
    }
}
