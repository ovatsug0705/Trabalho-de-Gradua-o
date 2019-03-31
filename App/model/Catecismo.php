<?php

namespace App\model;

class Catecismo {
    private $startConnection;
    private $connection;

    public function openConnection(){
        $this->startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
        $this->connection = $this->startConnection->getConnection();
    }

    public function getCatecismo(){
        $sql = 'select numero, texto from catecismo';
    
        $stmt = $this->connection->prepare($sql);
        // // $stmt->bindValue(':id', 2);
        $stmt->execute();
        
        // // $result = $stmt->fetchAll();
        // // $result = $stmt->fetch();
        session_start();
        $_SESSION['result'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        require getcwd(). '/App/views/catecismo.php';
        // // $result = $stmt->fetch(PDO::FETCH_BOTH);  
        // // $result = $stmt->fetch(PDO::FETCH_BOUND);
        // // $result = $stmt->fetch(PDO::FETCH_NUM);
        
        // echo '<pre>';
        // var_dump($result);
        // echo '<pre>';
    }
}
