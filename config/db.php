<?php

    class Database {
        private $host = 'localhost';
        private $db =   'galactia_papelaria';
        private $user = 'root';
        private $pass = '';
        private $charset='utf8mb4';
        public $conn;
        
        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset", $this->user, $this->pass);
            } catch(PDOException $e) {
               echo "Error connecting to database: ". $e->getMessage(); 
            }
            return $this->conn;
        }
    }