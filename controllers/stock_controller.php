<?php
    require_once ('../models/product.php');
    require_once ('../config/db.php');

    class StockController {
        private $stock;

        public function __construct() {
            $datebase = new Database();
            $db = $datebase->getConnection();
            $this->stock = new Stock($db);
        }
        public function updateStock($product_id, $quantity) {
            return $this->stock->updateStock($product_id, $quantity);
        }
       
        public function getAllStock() {
           return $this->stock->getAllStock();
        }
    }