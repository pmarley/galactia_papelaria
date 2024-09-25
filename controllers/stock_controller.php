<?php
    require_once __DIR__ . '/../models/stock.php';
    require_once __DIR__. '/../config/db.php';

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

        public function createStockItem($product_id, $quantity){
            return $this->stock->createStockItem($product_id, $quantity);
        }
    }