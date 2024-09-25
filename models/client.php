<?php
class Client {
    private $conn;
    private $table_name = "clients";

    public $client_id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllClients() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY client_id ASC";
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
        return "Error to get all clients";
    }

    public function createClient() {
        $query = "INSERT INTO " . $this->table_name . " SET name = :name, email = :email, phone = :phone, address = :address";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);

        return $stmt->execute();
    }

    public function getClientById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE client_id = ? LIMIT 0, 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function updateClient($id) {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, phone = :phone, address = :address WHERE client_id = :client_id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':client_id', $id);
        
        if($stmt->execute()) {
            return true;
        }
        
        echo "Error: ". $stmt->error;
        return false;
    }

    public function deleteClient($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE client_id= :client_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':client_id', $id);

        if($stmt->execute()) {
            return true;
        }
        echo "Error: ". $stmt->error;
        return false;
    }
}
