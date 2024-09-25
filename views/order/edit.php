<?php
require_once __DIR__ . '/../../controllers/order_controller.php';

$title = "Editar Pedidos";
require_once __DIR__ . '/../../views/layouts/header.php';

if (!isset($_GET['order_id'])) {
    header('Location: index.php');
    exit();
}

$orderController = new OrderController();
$order = $orderController->getOrderById($_GET['order_id']);

if (!$order) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated = $orderController->updateOrder([
        'order_id' => $_POST['order_id'],
        'order_name' => $_POST['order_name'],
        'price' => $_POST['price'],
        'cost' => $_POST['cost'],
    ]);

    if ($updated) {
        header('Location: index.php');
        exit();
    }
}
?>

<h1>Editar Pedido</h1>
<form action="edit.php?order_id=<?php echo htmlspecialchars($order['order_id']); ?>" method="POST">
    <div class="flex justify-c">
        <button type="submit" class="btn">Atualizar</button>
        <a class="btn delete" href="delete.php?order_id=<?php echo htmlspecialchars($order['order_id']); ?>">Deletar</a>
    </div>

    <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">

    <div class="form-group">
        <label for="order_name">Nome do Pedido:</label>
        <input type="text" name="order_name" value="<?php echo htmlspecialchars($order['order_name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="price">Preço:</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($order['price']); ?>" required>
    </div>

    <div class="form-group">
        <label for="cost">Custo:</label>
        <input type="number" step="0.01" name="cost" value="<?php echo htmlspecialchars($order['cost']); ?>" required>
    </div>
</form>

<a href="index.php" class="btn">Voltar</a>

<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?> 
