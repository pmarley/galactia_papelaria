<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../config/db.php';

class ProductController {
    private $product;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->product = new Product($db);
    }

    public function getAllProducts() {
        return $this->product->getAllProducts(); // Retorna diretamente os produtos
    }

    public function createProduct($data) {
        $this->product->name = $data['name'];
        $this->product->description = $data['description'];
        $this->product->price = $data['price'];
        $this->product->quantity = $data['quantity'];

        return $this->product->createProduct();
    }

    public function getProductById($id) {
        return $this->product->getProductById($id);
    }

    public function updateProduct($data) {
        $this->product->id = $data['id'];
        $this->product->name = $data['name'];
        $this->product->description = $data['description'];
        $this->product->price = $data['price'];
        $this->product->quantity = $data['quantity'];

        echo "<script>console.log('entrou updatedProduct')</script>";
        return $this->product->updateProduct($this->product->id);
    }

    public function deleteProduct($id) {
        return $this->product->deleteProduct($id);
    }
}
