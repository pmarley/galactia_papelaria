<?php
require_once __DIR__ . '/../models/client.php';
require_once __DIR__ . '/../config/db.php';

class ClientController {
    private $client;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->client = new Client($db);
    }

    public function getAllClients() {
        return $this->client->getAllClients();
    }

    public function createClient($data) {
        $this->client->name = $data['name'];
        $this->client->email = $data['email'];
        $this->client->phone = $data['phone'];
        $this->client->address = $data['address'];

        return $this->client->createClient();
    }

    public function getClientById($id) {
        return $this->client->getClientById($id);
    }

    public function updateClient($data) {
        $this->client->client_id = $data['client_id'];
        $this->client->name = $data['name'];
        $this->client->email = $data['email'];
        $this->client->phone = $data['phone'];
        $this->client->address = $data['address'];
        
        return $this->client->updateClient($this->client->client_id);
    }

    public function deleteClient($id) {
        return $this->client->deleteClient($id);
    }
}
