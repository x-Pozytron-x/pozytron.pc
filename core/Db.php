<?php
  class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct() {
        $this->host = __CFG_HOSTNAME;
        $this->username = __CFG_USERNAME;
        $this->password = __CFG_PASSWORD;
        $this->database = __CFG_DATABASE;

        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4", 
                $this->username, 
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            die('Ошибка подключения к базе данных: ' . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->connection;
    }
}