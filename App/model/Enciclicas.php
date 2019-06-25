<?php

namespace App\model;

class Enciclicas {
    private $startConnection, $connection;

    public function __construct() {
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getEnciclica($encyclical, $page){
        if (!$encyclical) {
            $sql = 'select nome, papa from enciclica_papal order by papa';

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            !(is_numeric($page)) ? $page = 0 : null;
            $endParagraph = $page * 3;
            $initialParagraph = $endParagraph - 3;

            $sql = 'select enciclica_papal.nome, texto_enciclica_papal.texto, texto_enciclica_papal.numero from texto_enciclica_papal inner join enciclica_papal on texto_enciclica_papal.id_enciclica = enciclica_papal.id_enciclica where enciclica_papal.url = (:url) and numero > (:iId) and numero <= (:eId)';

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
