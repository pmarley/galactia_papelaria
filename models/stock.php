<?php
    class Stock {
        private $conn;
        private $table_name = "stock";

        public $product_id;
        public $quantity;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function updateStock($product_id, $quantity) {
            $query = "UPDATE stock SET quantity = :quantity WHERE product_id = :product_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':product_id', $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function getAllStock() {
            $query = "SELECT * FROM ". $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

    }