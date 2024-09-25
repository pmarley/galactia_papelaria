<?php
require_once __DIR__ . '/../../controllers/order_controller.php';

$title = "Pedidos";
require_once __DIR__ . '/../../views/layouts/header.php';

$orderController = new OrderController();
$orders = $orderController->getAllOrders();
?>
    <h1>Pedidos</h1>
        <div class="flex justify-c">
            <a href="create.php" class="btn justify-c">Novo Pedido</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>ID</th>
                    <th>Nome do Pedido</th>
                    <th>Valor</th>
                    <th>Custo</th>
                    <th>Lucro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <a href="edit.php?order_id=<?php echo $order['order_id']; ?>" class="btn">Editar</a>
                        </td>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo htmlspecialchars($order['order_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['price']); ?></td>
                        <td><?php echo htmlspecialchars($order['cost']); ?></td>
                        <td><?php echo htmlspecialchars($order['profit']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php require_once __DIR__ . '/../../views/layouts/footer.php'; ?>
