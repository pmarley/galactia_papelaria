<?php
class Order {
    private $conn;
    private $table_name = "orders";

    public $order_id;
    public $order_name;
    public $price;
    public $cost;
    public $profit;
    public $total = 0;
    public $status = "Pending";
    public $created_at;
    public $updated_at;

    public $customer_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllOrders() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($order_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE order_id = ? LIMIT 0, 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $order_id);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo "Error: " . $stmt->error;
        return false;
    }

    public function createOrder() {
        $query = "INSERT INTO " . $this->table_name . " (order_name, price, cost, profit, total, status, customer_id)
                  VALUES (:order_name, :price, :cost, :profit, :total ,:status, :customer_id)";
        
        $stmt = $this->conn->prepare($query);

        $this->order_name = htmlspecialchars(strip_tags($this->order_name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));

        $this->profit = $this->calculateProfit();
        
        $stmt->bindParam(':order_name', $this->order_name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':cost', $this->cost);
        $stmt->bindParam(':profit', $this->profit);
        $stmt->bindParam(':total', $this->profit);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':customer_id', $this->customer_id);

        if ($stmt->execute()) {
            return true;
        }
        echo "Error: " . $stmt->error;
        return false;
    }

    public function updateOrder($order_id) {
        $query = "UPDATE " . $this->table_name . " SET order_name = :order_name, price = :price, cost = :cost, profit = :profit, total = :total, customer_id = :customer_id WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($query);

        $this->order_name = htmlspecialchars(strip_tags($this->order_name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->cost = htmlspecialchars(strip_tags($this->cost));
        $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));

        $this->profit = $this->calculateProfit(); 
        
        $stmt->bindParam(':order_name', $this->order_name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':cost', $this->cost);
        $stmt->bindParam(':profit', $this->profit);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':customer_id', $this->customer_id);
        $stmt->bindParam(':order_id', $order_id);
        
        
        if ($stmt->execute()) {
            echo '<script>console.log("entrou");</script>';
            return true;
        }else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function deleteOrder($order_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE order_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $order_id);
        if ($stmt->execute()) {
            return true;
        }
        echo "Error: " . $stmt->error;
        return false;
    }

    public function calculateProfit() {
        return $this->price - $this->cost; 
    }

    public function getOrdersByCustomerId($customer_id) {
        $query = "SELECT * FROM ". $this->table_name. " WHERE customer_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customer_id);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo "Error: ". $stmt->error;
        return false;
    }

    public function getCustomerNamesByCustomerId($customer_id) {
        $query = "SELECT name FROM customers WHERE customer_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customer_id);
        if($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['name'];
        }
        echo "Error: ". $stmt->error;
        return false;
    }
}
