<?php
require_once __DIR__ . '/../../controllers/order_controller.php';

$title = "Cadastrar Pedido";
require_once __DIR__ . '/../../views/layouts/header.php';
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderController = new OrderController();
    $orderController->createOrder([
        'order_name' => $_POST['order_name'],
        'price' => $_POST['price'],
        'cost' => $_POST['cost'],
    ]);
    header("Location: index.php");
}
?>
    <h1><?=$title?></h1>
        <form action="create.php" method="POST">
            <div class="form-btn">
                <button type="submit" class="btn">Cadastrar</button>
            </div>
            <div class="form-group">
                <label for="order_name">Nome do Pedido:</label>
                <input type="text" name="order_name" required>
            </div>

            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" step="0.01" name="price" required>
            </div>

            <div class="form-group">
                <label for="cost">Custo:</label>
                <input type="number" step="0.01" name="cost" required>
            </div>
        </form>
        <a href="index.php" class="btn">Voltar</a>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
