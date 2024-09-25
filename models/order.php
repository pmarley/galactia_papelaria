<?php
class Order {
    private $conn;
    private $table_name = "orders";

    public $order_id;
    public $order_name;
    public $price;
    public $cost;
    public $profit = 0;
    public $total = 0;
    public $status = "Pending";
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllOrders() {
        $query = "SELECT * FROM ". $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderById($order_id) {
        $query = "SELECT * FROM ". $this->table_name. " WHERE order_id = ? LIMIT 0, 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $order_id);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo "Error: " . $stmt->error;
        return false;
    }

    public function createOrder() {
        
        $query = "INSERT INTO ". $this->table_name. " (order_name, price, cost, profit, total, status)
                                               VALUES (:order_name, :price, :cost, :profit, :total, :status)";
        
        $stmt = $this->conn->prepare($query);

        $this->order_name = htmlspecialchars(strip_tags($this->order_name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->cost = htmlspecialchars(strip_tags($this->cost));

        $stmt->bindParam(':order_name', $this->order_name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':cost', $this->cost);
        $stmt->bindParam(':profit', $this->profit);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':status', $this->status);

        if ($stmt->execute()) {
            return true;
        }
        echo "Error: ". $stmt->error;
        return false;
    }

    public function updateOrder($order_id) {
        $query = "UPDATE ". $this->table_name. " SET order_name = :order_name, price = :price, cost = :cost WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($query);

        $this->order_name = htmlspecialchars(strip_tags($this->order_name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->cost = htmlspecialchars(strip_tags($this->cost));

        
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':order_name', $this->order_name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':cost', $this->cost);
        
        if ($stmt->execute()) {
            return true;
        }
        echo "Error: ". $stmt->error;
        return false;
    }

    public function deleteOrder($order_id) {
        $query = "DELETE FROM ". $this->table_name. " WHERE order_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $order_id);
        if ($stmt->execute()) {
            return true;
        }
        echo "Error: ". $stmt->error;
        return false;
    }
}

