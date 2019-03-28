<?php

class DatabaseConnection {
    private $dsn = '';
    private $host = '';
    private $user = '';
    private $pass = '';
    private $db = '';
    private $conn = '';

    public function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
        $this->options = [];
    }

    /**
     * @return PDO
     */
    public function getConnection() {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->pass, $this->options);
            return $this->conn;
        } catch (PDOException $ex) {
            echo 'Erro:' . $ex->getMessage();
        }
    }
}