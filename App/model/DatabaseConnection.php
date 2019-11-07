<?php
namespace App\Model;

/**
 * DatabaseConnection class
 *
 * Establishes the connection with the database
 *
 * @copyright  2019 Gustavo da Silva Gomes
 * @author     Gustavo da Silva Gomes <ovatsug8055@hotmail.com>
 * @since      Class available since Release 1.0.0
 */ 
class DatabaseConnection {
    private $dsn, $host, $user, $pass, $db, $conn, $options;

    /**
     * DatabaseConnection class constructor
     * 
     * @param string $host database host name
     * @param string $user database user name
     * @param string $pass database password
     * @param string $db database name
     * @return void
     */
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
     * Get database connection
     * 
     * @return PDO
     */
    public function getConnection() {
        try {
            $this->conn = new \PDO($this->dsn, $this->user, $this->pass, $this->options);
            return $this->conn;
        } catch (\PDOException $ex) {
            throw 'Erro:' . $ex->getMessage();
        }
    }
}