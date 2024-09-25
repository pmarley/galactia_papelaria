<?php
require_once __DIR__ . '/../models/customer.php';
require_once __DIR__ . '/../config/db.php';

class CustomerController {
    private $customer;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->customer = new Customer($db);
    }

    public function getAllCustomers() {
        return $this->customer->getAllCustomers();
    }

    public function createCustomer($data) {
        $this->customer->name = $data['name'];
        $this->customer->email = $data['email'];
        $this->customer->phone = $data['phone'];
        $this->customer->address = $data['address'];

        return $this->customer->createCustomer();
    }

    public function getCustomerById($id) {
        return $this->customer->getCustomerById($id);
    }

    public function updateCustomer($data) {
        $this->customer->customer_id = $data['customer_id'];
        $this->customer->name = $data['name'];
        $this->customer->email = $data['email'];
        $this->customer->phone = $data['phone'];
        $this->customer->address = $data['address'];
        
        return $this->customer->updateCustomer($this->customer->customer_id);
    }

    public function deleteCustomer($id) {
        return $this->customer->deleteCustomer($id);
    }
}
