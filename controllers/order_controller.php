<?php
    require_once __DIR__ . '/../models/order.php';
    require_once __DIR__. '/../config/db.php';

    class OrderController {
        private $order;

        public function __construct() {
            $datebase = new Database();
            $db = $datebase->getConnection();
            $this->order = new Order($db);
        }
        public function getAllOrders() {
            return $this->order->getAllOrders();
        }

        public function getOrderById($order_id) {
            return $this->order->getOrderById($order_id);
        }

        public function createOrder($data) {
            $this->order->order_name = $data['order_name'];
            $this->order->price = $data['price'];
            $this->order->cost = $data['cost'];

            return $this->order->createOrder();
        }
        public function updateOrder($data) {
            $this->order->order_id = $data['order_id'];
            $this->order->order_name = $data['order_name'];
            $this->order->price = $data['price'];
            $this->order->cost = $data['cost'];

            return $this->order->updateOrder($this->order->order_id);
        }

        public function deleteOrder($order_id) {
            return $this->order->deleteOrder($order_id);
        }
    }